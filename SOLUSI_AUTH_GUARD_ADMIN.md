# Solusi Error: Auth guard [admin] is not defined

## Masalah
Error yang muncul:
```
Auth guard [admin] is not defined.
```

## Penyebab
Guard `admin` dan `master_admin` belum didefinisikan di konfigurasi Laravel authentication.

## Solusi yang Telah Dibuat

### 1. Menambahkan Guard di config/auth.php

#### Guards
```php
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
    'master_admin' => [
        'driver' => 'session',
        'provider' => 'master_admins',
    ],
],
```

#### Providers
```php
'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => env('AUTH_MODEL', App\Models\User::class),
    ],
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],
    'master_admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\MasterAdmin::class,
    ],
],
```

#### Passwords
```php
'passwords' => [
    'users' => [
        'provider' => 'users',
        'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
        'expire' => 60,
        'throttle' => 60,
    ],
    'admins' => [
        'provider' => 'admins',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
    ],
    'master_admins' => [
        'provider' => 'master_admins',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
    ],
],
```

### 2. Memperbaiki AdminAuthController

#### Import Auth Facade
```php
use Illuminate\Support\Facades\Auth;
```

#### Method Login
```php
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');
    $credentials['status'] = 'approved';

    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['email' => 'Email atau password salah, atau akun belum disetujui.']);
}
```

#### Method Logout
```php
public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('admin.login');
}
```

### 3. Memperbaiki MasterAuthController

#### Method Login
```php
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('master_admin')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('master.dashboard');
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
}
```

#### Method Logout
```php
public function logout(Request $request)
{
    Auth::guard('master_admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('master.login');
}
```

### 4. Memperbaiki AdminMiddleware

```php
public function handle(Request $request, Closure $next)
{
    if (!Auth::guard('admin')->check()) {
        return redirect()->route('admin.login')->withErrors(['Silakan login sebagai Admin.']);
    }

    // Check if admin is approved
    $admin = Auth::guard('admin')->user();
    if ($admin && $admin->status !== 'approved') {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->withErrors(['Akun Anda belum disetujui oleh Master Admin.']);
    }

    return $next($request);
}
```

### 5. Membuat MasterAdminMiddleware

```php
public function handle(Request $request, Closure $next)
{
    if (!Auth::guard('master_admin')->check()) {
        return redirect()->route('master.login')->withErrors(['Silakan login sebagai Master Admin.']);
    }

    return $next($request);
}
```

### 6. Update Routes dengan Middleware

#### Admin Routes
```php
Route::middleware(['auth.admin'])->group(function () {
    // Admin CRUD Routes
    Route::get('/admin/posts', [AdminController::class, 'index'])->name('admin.posts.index');
    // ... lebih banyak routes
});
```

#### Master Admin Routes
```php
Route::middleware(['auth.master'])->group(function () {
    Route::get('/master/dashboard', [MasterAdminController::class, 'index'])->name('master.dashboard');
    // ... lebih banyak routes
});
```

## Cara Menjalankan Solusi

### 1. Clear Config Cache
```bash
php artisan config:clear
```

### 2. Clear Cache
```bash
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

### 3. Restart Server
```bash
php artisan serve
```

## Verifikasi Solusi

### 1. Cek Guard Configuration
```php
// Di tinker atau controller
Auth::guard('admin')->check(); // Should return false if not logged in
Auth::guard('master_admin')->check(); // Should return false if not logged in
```

### 2. Test Login
- Akses `/admin/login` - harus bisa login dengan admin
- Akses `/master/login` - harus bisa login dengan master admin

### 3. Test Middleware
- Akses `/admin/dashboard` tanpa login - harus redirect ke login
- Akses `/master/dashboard` tanpa login - harus redirect ke login

## Struktur Authentication

### Admin Authentication
- **Guard:** `admin`
- **Provider:** `admins`
- **Model:** `App\Models\Admin`
- **Middleware:** `auth.admin`

### Master Admin Authentication
- **Guard:** `master_admin`
- **Provider:** `master_admins`
- **Model:** `App\Models\MasterAdmin`
- **Middleware:** `auth.master`

## Fitur Security

### 1. Session Regeneration
- Session di-regenerate setiap login untuk mencegah session fixation

### 2. Status Check
- Admin harus memiliki status 'approved' untuk bisa login
- Master admin tidak perlu status check

### 3. Proper Logout
- Session di-invalidate saat logout
- Token di-regenerate untuk security

### 4. Error Messages
- Pesan error yang informatif untuk user

## Troubleshooting

### 1. Error "Guard not defined"
```bash
php artisan config:clear
php artisan cache:clear
```

### 2. Error "Provider not found"
- Pastikan model Admin dan MasterAdmin extends Authenticatable
- Pastikan provider sudah didefinisikan di config/auth.php

### 3. Error "Session not working"
```bash
php artisan session:table
php artisan migrate
```

### 4. Error "Route not found"
```bash
php artisan route:clear
php artisan route:cache
```

## Default Login Credentials

### Master Admin
- Email: `master@admin.com`
- Password: `password`

### Admin
- Email: `admin@admin.com`
- Password: `password`

## URL yang Tersedia

### Admin Routes
- `/admin/login` - Login admin
- `/admin/register` - Register admin
- `/admin/dashboard` - Dashboard admin (protected)
- `/admin/posts` - Kelola berita (protected)
- `/admin/categories` - Kelola kategori (protected)
- `/admin/departements` - Kelola departemen (protected)

### Master Admin Routes
- `/master/login` - Login master admin
- `/master/dashboard` - Dashboard master admin (protected)
- `/master/admins` - Kelola admin (protected)

## Kesimpulan

Error `Auth guard [admin] is not defined` sudah teratasi dengan:

1. ✅ **Menambahkan guard `admin` dan `master_admin`** di config/auth.php
2. ✅ **Menambahkan provider** untuk Admin dan MasterAdmin
3. ✅ **Memperbaiki controller** untuk menggunakan Auth facade
4. ✅ **Memperbaiki middleware** untuk menggunakan guard yang benar
5. ✅ **Update routes** dengan middleware yang sesuai

Sistem authentication sekarang sudah lengkap dan aman! 🎉
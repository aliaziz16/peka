# Sistem Admin Website Organisasi

## Overview
Sistem admin yang lengkap untuk website organisasi dengan fitur CRUD berita, kategori, dan autentikasi admin.

## Fitur yang Tersedia

### 1. Sistem Autentikasi
- **Master Admin**: Super admin yang dapat mengelola admin lain
- **Admin**: Admin biasa yang dapat mengelola berita dan kategori
- Login/Logout system
- Middleware autentikasi

### 2. Manajemen Berita (CRUD)
- ✅ Tambah berita baru
- ✅ Edit berita
- ✅ Hapus berita
- ✅ Upload gambar
- ✅ Auto-generate slug dari judul
- ✅ Kategori berita
- ✅ Rich text content

### 3. Manajemen Kategori
- ✅ Tambah kategori baru
- ✅ Edit kategori
- ✅ Hapus kategori (dengan validasi)
- ✅ Deskripsi kategori
- ✅ Auto-generate slug

### 4. Dashboard Admin
- ✅ Statistik berita dan kategori
- ✅ Berita terbaru
- ✅ Quick navigation
- ✅ Responsive design

## Struktur Database

### Tabel Posts
```sql
- id (primary key)
- category_id (foreign key)
- title (string)
- slug (string, unique)
- content (text)
- image (string, nullable)
- created_at, updated_at
```

### Tabel Categories
```sql
- id (primary key)
- name (string)
- slug (string, unique)
- description (text, nullable)
- created_at, updated_at
```

### Tabel Admins
```sql
- id (primary key)
- name (string)
- email (string, unique)
- password (string)
- status (enum: pending, approved, rejected)
- created_at, updated_at
```

### Tabel Master_Admins
```sql
- id (primary key)
- name (string)
- email (string, unique)
- password (string)
- status (enum: pending, approved, rejected)
- created_at, updated_at
```

## Routes yang Tersedia

### Public Routes
```
GET /                    - Homepage
GET /berita             - Daftar berita
GET /berita/{slug}      - Detail berita
GET /admin/login        - Login admin
GET /admin/register     - Register admin
GET /master/login       - Login master admin
```

### Admin Routes (Protected)
```
GET /admin/dashboard           - Dashboard admin
GET /admin/posts              - Daftar berita
GET /admin/posts/create       - Form tambah berita
POST /admin/posts             - Simpan berita
GET /admin/posts/{id}/edit    - Form edit berita
PUT /admin/posts/{id}         - Update berita
DELETE /admin/posts/{id}      - Hapus berita

GET /admin/categories              - Daftar kategori
GET /admin/categories/create       - Form tambah kategori
POST /admin/categories             - Simpan kategori
GET /admin/categories/{id}/edit    - Form edit kategori
PUT /admin/categories/{id}         - Update kategori
DELETE /admin/categories/{id}      - Hapus kategori
```

### Master Admin Routes
```
GET /master/dashboard        - Dashboard master admin
POST /master/admins         - Tambah admin
PUT /master/admins/{id}     - Update admin
DELETE /master/admins/{id}  - Hapus admin
POST /master/admins/{id}/approve  - Approve admin
POST /master/admins/{id}/reject   - Reject admin
```

## Cara Install dan Setup

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Setup Database
```bash
# Edit .env file dengan konfigurasi database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### 4. Jalankan Migration dan Seeder
```bash
php artisan migrate:fresh --seed
```

### 5. Setup Storage
```bash
php artisan storage:link
```

### 6. Build Assets
```bash
npm run build
```

### 7. Jalankan Server
```bash
php artisan serve
```

## Default Login Credentials

### Master Admin
- Email: `master@admin.com`
- Password: `password`

### Admin
- Email: `admin@admin.com`
- Password: `password`

## Fitur Tambahan

### 1. Auto-Generate Slug
- Slug otomatis dibuat dari judul berita
- Slug otomatis dibuat dari nama kategori
- Mencegah duplikasi slug

### 2. Image Upload
- Upload gambar untuk berita
- Validasi tipe file (hanya image)
- Penyimpanan di storage/app/public/posts

### 3. Validation
- Validasi form input
- Error handling
- Success/error messages

### 4. Security
- CSRF protection
- Middleware authentication
- Password hashing
- Input sanitization

## Struktur File yang Dibuat

### Controllers
- `AdminController.php` - CRUD berita
- `CategoryController.php` - CRUD kategori
- `AdminAuthController.php` - Autentikasi admin
- `MasterAdminController.php` - Manajemen admin

### Models
- `Post.php` - Model berita
- `Category.php` - Model kategori
- `Admin.php` - Model admin
- `MasterAdmin.php` - Model master admin

### Views
- `admin/posts/index.blade.php` - Daftar berita
- `admin/posts/create.blade.php` - Form tambah berita
- `admin/posts/edit.blade.php` - Form edit berita
- `admin/categories/index.blade.php` - Daftar kategori
- `admin/categories/create.blade.php` - Form tambah kategori
- `admin/categories/edit.blade.php` - Form edit kategori
- `dashboard/admin.blade.php` - Dashboard admin

### Middleware
- `AdminMiddleware.php` - Middleware autentikasi admin

## Cara Penggunaan

### 1. Login sebagai Admin
1. Buka `/admin/login`
2. Masukkan email dan password admin
3. Setelah login, akan diarahkan ke dashboard

### 2. Menambah Berita
1. Klik "Kelola Berita" di dashboard
2. Klik "Tambah Berita"
3. Isi form dengan data berita
4. Upload gambar (opsional)
5. Klik "Simpan Berita"

### 3. Mengelola Kategori
1. Klik "Kelola Kategori" di dashboard
2. Klik "Tambah Kategori"
3. Isi nama dan deskripsi kategori
4. Klik "Simpan Kategori"

### 4. Edit/Hapus Data
- Klik icon edit untuk mengubah data
- Klik icon hapus untuk menghapus data
- Konfirmasi sebelum menghapus

## Troubleshooting

### 1. Error "Class not found"
```bash
composer dump-autoload
```

### 2. Error "Permission denied" untuk storage
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### 3. Error database connection
- Pastikan database sudah dibuat
- Cek konfigurasi di file .env
- Pastikan MySQL/PostgreSQL berjalan

### 4. Image tidak muncul
```bash
php artisan storage:link
```

## Customization

### 1. Mengubah Tema
- Edit file CSS di `resources/css/`
- Gunakan Tailwind CSS untuk styling

### 2. Menambah Fitur
- Buat controller baru
- Tambah route di `routes/web.php`
- Buat view di `resources/views/`

### 3. Mengubah Validasi
- Edit method validation di controller
- Tambah custom validation rules

## Security Best Practices

1. **Ganti Password Default**
   - Ganti password admin dan master admin setelah setup
   - Gunakan password yang kuat

2. **Environment Variables**
   - Jangan hardcode sensitive data
   - Gunakan .env file untuk konfigurasi

3. **File Upload Security**
   - Validasi tipe file
   - Batasi ukuran file
   - Scan virus jika diperlukan

4. **Database Security**
   - Backup database secara berkala
   - Gunakan prepared statements
   - Validasi input user

## Support

Jika ada pertanyaan atau masalah, silakan buat issue di repository atau hubungi developer.

---

**Sistem ini sudah siap digunakan untuk website organisasi dengan fitur admin yang lengkap!**
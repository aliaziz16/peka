# Solusi Error: Table 'departements' doesn't exist

## Masalah
Error yang muncul:
```
SQLSTATE[42S02]: Base table or view not found: 1146 Table 'titikpeka.departements' doesn't exist
```

## Penyebab
Tabel `departements` belum dibuat di database karena:
1. Migration untuk tabel `departements` belum ada
2. Migration belum dijalankan
3. Model `Departement` sudah ada tapi tabel belum dibuat

## Solusi yang Telah Dibuat

### 1. Membuat Migration untuk Tabel Departements
File: `database/migrations/2025_07_26_200000_create_departements_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('program_work')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departements');
    }
};
```

### 2. Memperbaiki Model Departement
File: `app/Models/Departement.php`

- Menambahkan auto-generate slug
- Menambahkan timestamps
- Menambahkan fillable fields

### 3. Membuat Seeder untuk Data Departemen
File: `database/seeders/DatabaseSeeder.php`

Menambahkan data default departemen:
- Departemen Pendidikan
- Departemen Sosial
- Departemen Ekonomi
- Departemen Kesehatan
- Departemen Teknologi

### 4. Membuat Admin Controller untuk Departemen
File: `app/Http/Controllers/AdminDepartementController.php`

Fitur yang tersedia:
- CRUD departemen
- Upload gambar
- Validasi input
- Soft delete dengan konfirmasi

### 5. Menambahkan Routes untuk Admin Departemen
File: `routes/web.php`

```php
// Departement Management
Route::get('/admin/departements', [AdminDepartementController::class, 'index'])->name('admin.departements.index');
Route::get('/admin/departements/create', [AdminDepartementController::class, 'create'])->name('admin.departements.create');
Route::post('/admin/departements', [AdminDepartementController::class, 'store'])->name('admin.departements.store');
Route::get('/admin/departements/{id}/edit', [AdminDepartementController::class, 'edit'])->name('admin.departements.edit');
Route::put('/admin/departements/{id}', [AdminDepartementController::class, 'update'])->name('admin.departements.update');
Route::delete('/admin/departements/{id}', [AdminDepartementController::class, 'destroy'])->name('admin.departements.destroy');
```

### 6. Membuat View untuk Admin Departemen
File: `resources/views/admin/departements/index.blade.php`

- Tabel daftar departemen
- Aksi edit dan hapus
- Upload gambar
- Responsive design

### 7. Update Dashboard Admin
File: `resources/views/dashboard/admin.blade.php`

- Menambahkan link ke kelola departemen
- Menambahkan statistik departemen

## Cara Menjalankan Solusi

### 1. Jalankan Migration
```bash
php artisan migrate
```

### 2. Jalankan Seeder (jika belum)
```bash
php artisan db:seed
```

### 3. Setup Storage (untuk upload gambar)
```bash
php artisan storage:link
```

### 4. Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## Struktur Tabel Departements

```sql
CREATE TABLE departements (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    description TEXT NULL,
    program_work TEXT NULL,
    image VARCHAR(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## Fitur yang Tersedia

### 1. CRUD Departemen
- ✅ Tambah departemen baru
- ✅ Edit departemen
- ✅ Hapus departemen
- ✅ Upload gambar departemen

### 2. Auto-Generate Slug
- Slug otomatis dibuat dari nama departemen
- Mencegah duplikasi slug

### 3. Validasi Input
- Validasi nama departemen (required)
- Validasi gambar (image, max 2MB)
- Validasi deskripsi dan program kerja

### 4. Image Upload
- Upload gambar untuk departemen
- Penyimpanan di storage/app/public/departements
- Auto-delete gambar lama saat update

## URL yang Tersedia

- `/admin/departements` - Daftar departemen
- `/admin/departements/create` - Form tambah departemen
- `/admin/departements/{id}/edit` - Form edit departemen

## Troubleshooting

### 1. Error "Table doesn't exist"
```bash
php artisan migrate:fresh --seed
```

### 2. Error "Class not found"
```bash
composer dump-autoload
```

### 3. Error upload gambar
```bash
php artisan storage:link
chmod -R 775 storage
```

### 4. Error slug duplicate
- Sistem akan auto-generate slug yang unik
- Jika masih error, cek data di database

## Data Default yang Dibuat

Setelah menjalankan seeder, akan ada 5 departemen default:

1. **Departemen Pendidikan**
   - Deskripsi: Departemen yang menangani program-program pendidikan dan pelatihan
   - Program Kerja: Pelatihan, workshop, dan pengembangan SDM

2. **Departemen Sosial**
   - Deskripsi: Departemen yang menangani program-program sosial dan kemanusiaan
   - Program Kerja: Bantuan sosial, pengembangan masyarakat, dan program kemanusiaan

3. **Departemen Ekonomi**
   - Deskripsi: Departemen yang menangani program-program ekonomi dan pengembangan usaha
   - Program Kerja: Pengembangan UMKM, pelatihan bisnis, dan program ekonomi kreatif

4. **Departemen Kesehatan**
   - Deskripsi: Departemen yang menangani program-program kesehatan dan lingkungan
   - Program Kerja: Kampanye kesehatan, pemeriksaan kesehatan gratis, dan program lingkungan

5. **Departemen Teknologi**
   - Deskripsi: Departemen yang menangani program-program teknologi dan digital
   - Program Kerja: Pelatihan IT, pengembangan aplikasi, dan program digitalisasi

## Verifikasi Solusi

Setelah menjalankan semua langkah di atas, cek:

1. **Database**: Tabel `departements` sudah dibuat
2. **Admin Panel**: Bisa akses `/admin/departements`
3. **Data**: Ada 5 departemen default
4. **CRUD**: Bisa tambah, edit, hapus departemen
5. **Upload**: Bisa upload gambar departemen

Error seharusnya sudah teratasi dan sistem departemen sudah berfungsi dengan baik! 🎉
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Admin;
use App\Models\MasterAdmin;
use App\Models\Departement;
use App\Models\Leader;
use App\Models\Quote;
use App\Models\Image;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default categories
        $categories = [
            ['name' => 'Berita Utama', 'description' => 'Berita utama organisasi'],
            ['name' => 'Kegiatan', 'description' => 'Berita tentang kegiatan organisasi'],
            ['name' => 'Pengumuman', 'description' => 'Pengumuman penting'],
            ['name' => 'Artikel', 'description' => 'Artikel dan opini'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create default master admin
        MasterAdmin::create([
            'name' => 'Master Admin',
            'email' => 'master@admin.com',
            'password' => Hash::make('password'),
            'status' => 'approved',
        ]);

        // Create default admin
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'status' => 'approved',
        ]);

        // Create default departments
        $departements = [
            [
                'name' => 'Departemen Pendidikan',
                'description' => 'Departemen yang menangani program-program pendidikan dan pelatihan.',
                'program_work' => 'Program kerja departemen pendidikan meliputi pelatihan, workshop, dan pengembangan SDM.',
            ],
            [
                'name' => 'Departemen Sosial',
                'description' => 'Departemen yang menangani program-program sosial dan kemanusiaan.',
                'program_work' => 'Program kerja departemen sosial meliputi bantuan sosial, pengembangan masyarakat, dan program kemanusiaan.',
            ],
            [
                'name' => 'Departemen Ekonomi',
                'description' => 'Departemen yang menangani program-program ekonomi dan pengembangan usaha.',
                'program_work' => 'Program kerja departemen ekonomi meliputi pengembangan UMKM, pelatihan bisnis, dan program ekonomi kreatif.',
            ],
            [
                'name' => 'Departemen Kesehatan',
                'description' => 'Departemen yang menangani program-program kesehatan dan lingkungan.',
                'program_work' => 'Program kerja departemen kesehatan meliputi kampanye kesehatan, pemeriksaan kesehatan gratis, dan program lingkungan.',
            ],
            [
                'name' => 'Departemen Teknologi',
                'description' => 'Departemen yang menangani program-program teknologi dan digital.',
                'program_work' => 'Program kerja departemen teknologi meliputi pelatihan IT, pengembangan aplikasi, dan program digitalisasi.',
            ],
        ];

        foreach ($departements as $departement) {
            Departement::create($departement);
        }

        // Create default leaders
        $leaders = [
            [
                'name' => 'Ahmad Fauzi',
                'position' => 'Ketua IPNU',
                'period' => '2024-2025',
                'description' => 'Ketua IPNU periode 2024-2025 yang berdedikasi tinggi dalam pengembangan organisasi.',
                'photo' => null,
            ],
            [
                'name' => 'Siti Nurhaliza',
                'position' => 'Ketua IPPNU',
                'period' => '2024-2025',
                'description' => 'Ketua IPPNU periode 2024-2025 yang aktif dalam program-program organisasi.',
                'photo' => null,
            ],
            [
                'name' => 'Muhammad Rizki',
                'position' => 'Ketua IPNU',
                'period' => '2023-2024',
                'description' => 'Ketua IPNU periode sebelumnya yang telah berkontribusi besar.',
                'photo' => null,
            ],
            [
                'name' => 'Nurul Hidayah',
                'position' => 'Ketua IPPNU',
                'period' => '2023-2024',
                'description' => 'Ketua IPPNU periode sebelumnya yang telah memberikan dedikasi terbaik.',
                'photo' => null,
            ],
        ];

        foreach ($leaders as $leader) {
            Leader::create($leader);
        }

        // Create default quotes
        $quotes = [
            [
                'content' => 'Pemuda adalah harapan bangsa, mari kita wujudkan masa depan yang lebih baik.',
                'author' => 'KH. Hasyim Asyari',
                'source' => 'Pidato Kebangsaan',
            ],
            [
                'content' => 'Belajar adalah kewajiban setiap muslim dari buaian hingga liang lahat.',
                'author' => 'Nabi Muhammad SAW',
                'source' => 'Hadits',
            ],
            [
                'content' => 'Kemajuan bangsa terletak pada kualitas pemudanya.',
                'author' => 'Soekarno',
                'source' => 'Pidato Kemerdekaan',
            ],
            [
                'content' => 'Pemuda yang berakhlak mulia adalah aset terbesar bangsa.',
                'author' => 'KH. Abdurrahman Wahid',
                'source' => 'Pidato Organisasi',
            ],
        ];

        foreach ($quotes as $quote) {
            Quote::create($quote);
        }

        // Create default images
        $images = [
            [
                'title' => 'Logo IPNU',
                'filename' => 'logo-ipnu.png',
                'path' => 'images/logo-ipnu.png',
                'alt_text' => 'Logo IPNU',
                'category' => 'logo',
                'is_active' => true,
            ],
            [
                'title' => 'Logo IPPNU',
                'filename' => 'logo-ippnu.png',
                'path' => 'images/logo-ippnu.png',
                'alt_text' => 'Logo IPPNU',
                'category' => 'logo',
                'is_active' => true,
            ],
            [
                'title' => 'Kantor Organisasi',
                'filename' => 'kantor-organisasi.jpg',
                'path' => 'images/kantor-organisasi.jpg',
                'alt_text' => 'Kantor Organisasi',
                'category' => 'facility',
                'is_active' => true,
            ],
        ];

        foreach ($images as $image) {
            Image::create($image);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Admin;
use App\Models\MasterAdmin;
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
    }
}

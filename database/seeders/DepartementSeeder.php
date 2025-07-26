<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departement;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
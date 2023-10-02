<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a dummy project
        Project::create([
            'name'           => 'Sample Project',
            'lokasi'         => 'Jakarta, Indonesia',
            'waktu_mulai'    => now(),
            'waktu_selesai'  => now()->addMonths(3),
            'total_pekerja'  => 50,
            'nama_mandor'    => 2,
            'nilai_project'  => 50000000,
            'status'         => 'Belum Selesai',
            'foto'           => ''
        ]);
    }
}

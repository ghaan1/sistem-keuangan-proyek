<?php

namespace Database\Seeders;

use App\Models\RolePekerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePekerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolePekerja::insert(
            [
                [
                    'name' => 'Kontraktor',
                ],
                [
                    'name' => 'Mandor',
                ],
                [
                    'name' => 'Tukang',
                ],
                [
                    'name' => 'Kuli',
                ],

            ]
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\Pekerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PekerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pekerja::insert(
            [
                [
                    'name' => 'Vistor',
                    'role_pekerja_id' => 1,
                ],
                [
                    'name' => 'Alex',
                    'role_pekerja_id' => 2,
                ],
                [
                    'name' => 'Ghani',
                    'role_pekerja_id' => 2,
                ],

            ]
        );
    }
}

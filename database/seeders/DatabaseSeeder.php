<?php

namespace Database\Seeders;

use App\Models\RolePekerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            RoleAndPermissionSeeder::class,
            MenuGroupSeeder::class,
            MenuItemSeeder::class,
            CategorySeeder::class,
            RolePekerjaSeeder::class,
            PekerjaSeeder::class,
            ProjectSeeder::class,
            SaldoSeeder::class
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SaldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timezone = 'Asia/Jakarta';
        $history = [
            [
                'id' => 1,
                'saldo_type' => 'saldo_project',
                'amount' => 1000000,
                'keterangan' => 'Termin 1',
                'created_at' => Carbon::now($timezone)->format('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'saldo_type' => 'piutang_pengusaha',
                'amount' => 500000,
                'keterangan' => 'Belanja Besi',
                'created_at' => Carbon::now($timezone)->format('Y-m-d H:i:s'),
            ],
        ];


        DB::table('saldo')->insert([
            'saldo_project' => 1000000,
            'piutang_pengusaha' => 500000.00,
            'project_id' => 1,
            'history' => json_encode($history),
        ]);
    }
}

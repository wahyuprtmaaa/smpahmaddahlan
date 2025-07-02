<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RekeningSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rekenings')->insert([
            [
                'nama_rekening' => 'Yayasan Ahmad Dahlan',
                'bank' => 'Bank BRI',
                'nomor_rekening' => '1234567890',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rekening' => 'SMP Ahmad Dahlan',
                'bank' => 'Bank BCA',
                'nomor_rekening' => '0987654321',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

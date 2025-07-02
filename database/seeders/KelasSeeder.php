<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'nama' => 'VII A',
                'tingkat' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'VIII A',
                'tingkat' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'IX A',
                'tingkat' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

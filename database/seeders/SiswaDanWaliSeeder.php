<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaDanWaliSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $waliRole = Role::firstOrCreate(['name' => 'wali']);

        $kelasIds = Kelas::pluck('id')->toArray();
        if (empty($kelasIds)) {
            $kelasIds = [
                Kelas::create([
                    'nama' => 'XII RPL 1',
                    'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'
                ])->id,
                Kelas::create([
                    'nama' => 'XII TKJ 1',
                    'kompetensi_keahlian' => 'Teknik Komputer dan Jaringan'
                ])->id,
            ];
        }

        foreach (range(1, 20) as $i) {
            $tanggal_lahir = $faker->dateTimeBetween('-16 years', '-13 years')->format('Y-m-d');
            $passwordWali = date('dmY', strtotime($tanggal_lahir));
            $namaAnak = $faker->name();

            $wali = User::create([
                'name' => $faker->name(),
                'username' => strtolower(str_replace(' ', '.', $namaAnak)),
                'password' => Hash::make($passwordWali),
                'alamat' => $faker->address(),
                'telepon' => $faker->numerify('08##########'),
                'status' => 1,
            ]);
            $wali->assignRole($waliRole);

            Siswa::create([
                'nisn' => $faker->unique()->numerify('00########'),
                'nis' => $faker->unique()->numerify('2023####'),
                'nama' => $namaAnak,
                'id_kelas' => $faker->randomElement($kelasIds),
                'alamat' => $faker->address(),
                'telepon' => $faker->numerify('08##########'),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tanggal_lahir' => $tanggal_lahir,
                'foto' => null,
                'user_id' => $wali->id,
            ]);
        }
    }
}

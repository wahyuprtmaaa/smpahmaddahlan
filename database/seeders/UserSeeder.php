<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $adminRole = \Spatie\Permission\Models\Role::where('name', 'admin')->first();
        $operatorRole = \Spatie\Permission\Models\Role::where('name', 'operator')->first();
        $waliRole = \Spatie\Permission\Models\Role::where('name', 'wali')->first();

        $adminName = 'Admin';
        User::create([
            'name' => $adminName,
            'username' => strtolower($adminName),
            'password' => Hash::make('admin123'),
            'alamat' => 'sipin',
            'telepon' => '081234567890',
            'status' => 1,
        ])->assignRole($adminRole);

        $operatorName = 'Operator';
        User::create([
            'name' => $operatorName,
            'username' => strtolower($operatorName),
            'password' => Hash::make('operator123'),
            'alamat' => 'tugu juang',
            'telepon' => '081234567891',
            'status' => 1,
        ])->assignRole($operatorRole);

        // $waliName = 'Dewi';
        // User::create([
        //     'name' => $waliName,
        //     'username' => strtolower(str_replace(' ', '.', $waliName)),
        //     'password' => Hash::make('wali123'),
        //     'alamat' => 'jeramba bolong',
        //     'telepon' => '081278247284',
        //     'status' => 1,
        // ])->assignRole($waliRole);

        // foreach (range(1, 19) as $index) {
        //     $name = $faker->name();
        //     User::create([
        //         'name' => $name,
        //         'username' => strtolower(str_replace(' ', '.', $name)),
        //         'password' => Hash::make('wali123'),
        //         'alamat' => $faker->address(),
        //         'telepon' => '081278247284',
        //         'status' => 1,
        //     ])->assignRole($waliRole);
        // }
    }
}

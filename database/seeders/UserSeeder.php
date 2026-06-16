<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Owner
        User::updateOrCreate(
            ['nik' => '01'],
            [
                'name' => 'Pemilik Toko',
                'email' => 'owner@stockopname.com',
                'password' => Hash::make('01'), // default password = NIK
                'role' => 'owner',
                'must_reset_password' => true,
            ]
        );

        // Admin Gudang
        User::updateOrCreate(
            ['email' => 'admin.gudang@stockopname.com'],
            [
                'nik' => '02',
                'name' => 'Admin Gudang',
                'password' => Hash::make('02'), // default password = NIK
                'role' => 'admin_gudang',
                'must_reset_password' => true,
            ]
        );

        // Kasir 1
        User::updateOrCreate(
            ['email' => 'kasir1@stockopname.com'],
            [
                'nik' => '03',
                'name' => 'Kasir Utama',
                'password' => Hash::make('03'), // default password = NIK
                'role' => 'kasir',
                'must_reset_password' => true,
            ]
        );

        // Kasir 2
        User::updateOrCreate(
            ['email' => 'kasir2@stockopname.com'],
            [
                'nik' => '04',
                'name' => 'Kasir Cadangan',
                'password' => Hash::make('04'), // default password = NIK
                'role' => 'kasir',
                'must_reset_password' => true,
            ]
        );
    }
}

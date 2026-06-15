<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Owner
        User::updateOrCreate(
            ['nik' => '000001'],
            [
                'name' => 'Pemilik Toko',
                'email' => 'owner@stockopname.com',
                'password' => Hash::make('000001'), // default password = NIK
                'role' => 'owner',
                'must_reset_password' => true,
            ]
        );

        // Admin Gudang
        User::updateOrCreate(
            ['nik' => '000002'],
            [
                'name' => 'Admin Gudang',
                'email' => 'admin.gudang@stockopname.com',
                'password' => Hash::make('000002'), // default password = NIK
                'role' => 'admin_gudang',
                'must_reset_password' => true,
            ]
        );

        // Kasir 1
        User::updateOrCreate(
            ['nik' => '000003'],
            [
                'name' => 'Kasir Utama',
                'email' => 'kasir1@stockopname.com',
                'password' => Hash::make('000003'), // default password = NIK
                'role' => 'kasir',
                'must_reset_password' => true,
            ]
        );

        // Kasir 2
        User::updateOrCreate(
            ['nik' => '000004'],
            [
                'name' => 'Kasir Cadangan',
                'email' => 'kasir2@stockopname.com',
                'password' => Hash::make('000004'), // default password = NIK
                'role' => 'kasir',
                'must_reset_password' => true,
            ]
        );
    }
}

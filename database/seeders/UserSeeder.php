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
    }
}

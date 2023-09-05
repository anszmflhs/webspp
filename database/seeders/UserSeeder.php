<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Purno',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11223344')
        ]);
        $user1->assignRole('admin');
        $user2 = User::create([
            'name' => 'Ahmad',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('11223344')
        ]);
        $user2->assignRole('petugas');
        $user3 = User::create([
            'name' => 'Panji',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('11223344')
        ]);
        $user3->assignRole('siswa');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $roles = ['admin', 'petugas', 'siswa'];
        // foreach ($roles as $role) {
        //     Role::create([
        //         'name' => $role
        //     ]);
        // }
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        Role::create([
            'name' => 'petugas',
            'guard_name' => 'web',
        ]);
        Role::create([
            'name' => 'siswa',
            'guard_name' => 'web',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-role',
            'read-role',
            'update-role',
            'delete-role',
            'create-admin',
            'read-admin',
            'update-admin',
            'delete-admin',
            'create-petugas',
            'read-petugas',
            'update-petugas',
            'delete-petugas',
            'create-siswa',
            'read-siswa',
            'update-siswa',
            'delete-siswa',
            'create-pembayaran',
            'read-pembayaran',
            'update-pembayaran',
            'delete-pembayaran',
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $role = Role::where('name','admin')->first();
        $role->syncPermissions($permissions);
    }
}

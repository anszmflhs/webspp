<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            PetugasSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            SppSeeder::class,
            // PermintaanSeeder::class,
        ]);
    }
}

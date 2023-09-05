<?php

namespace Database\Seeders;

use App\Models\Spp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'kelas_id' => '1',
                'nominal' => '250000',
            ],
            [
                'kelas_id' => '2',
                'nominal' => '200000',
            ],
            [
                'kelas_id' => '3',
                'nominal' => '150000',
            ],
        ];

        foreach ($datas as $value) {
            Spp::create($value);
        }
    }
}

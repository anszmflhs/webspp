<?php

namespace Database\Seeders;

use App\Models\Permintaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermintaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'user_id' => '1',
                'kelas_id' => '1',
                'spp_id' => '1',
                'tanggal_bayar' => date('Y-m-d'),
                'status' => 'unpaid'
            ],
            [
                'user_id' => '2',
                'kelas_id' => '2',
                'spp_id' => '2',
                'tanggal_bayar' => date('Y-m-d'),
                'status' => 'unpaid'
            ],
            [
                'user_id' => '3',
                'kelas_id' => '3',
                'spp_id' => '3',
                'tanggal_bayar' => date('Y-m-d'),
                'status' => 'unpaid'
            ],
        ];

        foreach ($datas as $value) {
            Permintaan::create($value);
        }
    }
}

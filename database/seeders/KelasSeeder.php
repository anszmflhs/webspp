<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'user_id' => '1',
                'jurusan' => 'RPL',
            ],
            [
                'user_id' => '2',
                'jurusan' => 'TKJ',
            ],
            [
                'user_id' => '3',
                'jurusan' => 'DMM',
            ],
        ];
        foreach ($datas as $value) {
            Kelas::create($value);
        }
    }
}

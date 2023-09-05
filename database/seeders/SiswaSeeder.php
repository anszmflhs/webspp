<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'Panji',
                'nisn' => '9123456789',
                'nis' => '9123456778',
                'kelas_id' => '1',
                'alamat' => 'Indonesia',
                'no_telp' => '013433',
                'user_id' => '1',
            ],
            [
                'name' => 'Punjul',
                'nisn' => '9223456788',
                'nis' => '9223456777',
                'kelas_id' => '2',
                'alamat' => 'Indonesia',
                'no_telp' => '08425',
                'user_id' => '2',
            ],
            [
                'name' => 'Puji',
                'nisn' => '9323456777',
                'nis' => '9323456776',
                'kelas_id' => '3',
                'alamat' => 'Indonesia',
                'no_telp' => '07674',
                'user_id' => '3',
            ],
        ];

        foreach ($datas as $value) {
            Siswa::create($value);
        }

    }
}

<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'Ahmad',
                'contact' => '092309293',
                'hire_date' => date('Y-m-d'),
                'gender' => 'L',
                'address' => 'Indonesia',
                'photo' => 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg',
                'user_id' => '1'
            ],
            [
                'name' => 'Udin',
                'contact' => '0829292',
                'hire_date' => date('Y-m-d'),
                'gender' => 'L',
                'address' => 'Indonesia',
                'photo' => 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg',
                'user_id' => '2'
            ],
            [
                'name' => 'Jainab',
                'contact' => '0627221',
                'hire_date' => date('Y-m-d'),
                'gender' => 'P',
                'address' => 'Indonesia',
                'photo' => 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg',
                'user_id' => '3'
            ],
        ];
        foreach ($datas as $value) {
            Petugas::create($value);
        }
    }
}

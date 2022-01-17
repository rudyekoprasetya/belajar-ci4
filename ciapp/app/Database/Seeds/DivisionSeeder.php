<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DivisionSeeder extends Seeder
{
    public function run()
    {
        //setting faker untuk data dari indonesia
        $faker = \Faker\Factory::create('id_ID');

        //buat 10 data
        for($i =0; $i < 4; $i++) {
            $data = [
                //generate divisi
                'division' => $faker->randomElement(['operasional', 'manager', 'administrasi']),
                //generate is_aktif untuk yes atau no
                'is_aktif' => $faker->randomElement(['yes','no'])
            ];
            //memasukan data ke database
            $this->db->table('divisions')->insert($data);
        }
    }
}

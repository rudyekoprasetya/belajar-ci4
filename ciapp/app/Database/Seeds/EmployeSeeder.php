<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmployeSeeder extends Seeder
{
    public function run()
    {
        //setting faker untuk data dari indonesia
        $faker = \Faker\Factory::create('id_ID');

        //buat 10 data
        for($i =0; $i < 10; $i++) {
            $data = [
                //generate nama  
                'nama' => $faker->name,
                //generate alamat
                'alamat' => $faker->address,
                //generate gender untuk L atau P
                'gender' => $faker->randomElement(['L','P']),
                //generate gaji 100.000, 200.000 dan 80.000
                'gaji' => $faker->randomElement([100000,200000,80000])
            ];
            //memasukan data ke database
            $this->db->table('employes')->insert($data);
        }
        
    }
}

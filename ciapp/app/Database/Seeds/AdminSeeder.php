<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        //setting faker untuk data dari indonesia
        $faker = \Faker\Factory::create('id_ID');

        //buat 10 data
        for($i =0; $i < 5; $i++) {
            $data = [
                //generate username  
                'username' => $faker->email,
                //generate password
                'password' => '123456'
            ];
            //memasukan data ke database
            $this->db->table('admins')->insert($data);
        }
        
    }
}

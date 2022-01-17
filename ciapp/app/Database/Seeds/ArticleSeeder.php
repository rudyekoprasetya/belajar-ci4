<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        //setting faker
        $faker = \Faker\Factory::create('id_ID');

        //buat 5 data artikel
        for($i=0;$i<5;$i++) {
            $data = [
                'title' => $faker->sentence,
                'articles' => $faker->paragraph,
                'author' => $faker->name
            ];
            //memasukan data ke database
            $this->db->table('articles')->insert($data);
        }        
    }
}

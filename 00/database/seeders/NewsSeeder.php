<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData() {
        $faker = \Faker\Factory::create();

        $data = [];
        $category = ['Sport','Politics','Culture'];

        for ($i=0; $i < 10; $i++){
            $category_id = rand(1,3);
            $index = $category_id - 1;

            $data[] = [
                'category_id' => $category_id,
                'title' => $faker->sentence(rand(2,5)),
                'text' => $faker->sentence(rand(50,100)) . " ($category[$index])",
            ];
        }

        return $data;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData() {
        // $faker = \Faker\Factory::create();

        $data = [];
        $category = ['Sport','Politics','Culture'];

        foreach ($category as $value) {
            $data[] = [
                'title' => $value,  
            ];
        }

        return $data;
    }
}

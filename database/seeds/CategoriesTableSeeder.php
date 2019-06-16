<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_id' => 1,
            'name' => 'Pije Alkoolike',
            'imgurl' => '/images/alcoholic.jpg'
            ]);
        DB::table('categories')->insert([
            'category_id' => 2,
            'name' => 'Pije Me Gaz',
            'imgurl' => '/images/cold.jpg'
            ]);
        DB::table('categories')->insert([
            'category_id' => 3,
            'name' => 'Pije Pa Gaz',
            'imgurl' => '/images/hot_drinks.jpg'
            ]);
        DB::table('categories')->insert([
            'category_id' => 4,
            'name' => 'Snacks',
            'imgurl' => '/images/hot_drinks.jpg'
            ]);
        DB::table('categories')->insert([
            'category_id' => 5,
            'name' => 'Pije Kafe',
            'imgurl' => '/images/cafe.jpg'
            ]);
        
    }
}

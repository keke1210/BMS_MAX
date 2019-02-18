<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Cola',
            'cmimi' => 150.00
        ]);
         DB::table('products')->insert([
            'name' => 'Fanta',
            'cmimi' => 150.00
        ]);
          DB::table('products')->insert([
            'name' => 'Ivi',
            'cmimi' => 150.00
        ]);
           DB::table('products')->insert([
            'name' => 'Red Bull',
            'cmimi' => 150.00
        ]);
            DB::table('products')->insert([
            'name' => 'Uje',
            'cmimi' => 150.00
        ]);
 
    }
}

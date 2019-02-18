<?php

use Illuminate\Database\Seeder;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_details')->insert([
            'order_id' => 1,
            'prod_id' => 1,
            'sasia' => 5
            ]);
         DB::table('order_details')->insert([
            'order_id' => 1,
            'prod_id' => 2,
            'sasia' => 6
        ]);
          DB::table('order_details')->insert([
            'order_id' => 1,
            'prod_id' => 3,
            'sasia' => 4
        ]);
           DB::table('order_details')->insert([
            'order_id' => 2,
            'prod_id' => 2,
            'sasia' => 1
        ]);
            DB::table('order_details')->insert([
            'order_id' => 2,
            'prod_id' => 1,
            'sasia' => 9
        ]);
        
    }
}

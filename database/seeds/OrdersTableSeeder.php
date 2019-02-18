<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => 4,
            'T_id'=>1
        ]);
        
        DB::table('orders')->insert([
            'user_id' => 5,
            'T_id'=>1
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => '1',
            'stock_ean' => '7440830185127',
            'quantity' => '5',
            'order_date' => '2019-06-30 13:34:04'
        ]);

        DB::table('orders')->insert([
            'user_id' => '1',
            'stock_ean' => '7440830185127',
            'quantity' => '12',
            'order_date' => '2019-07-01 13:34:04'
        ]);

        DB::table('orders')->insert([
            'user_id' => '1',
            'stock_ean' => '7440830185127',
            'quantity' => '15',
            'order_date' => '2019-07-02 13:34:04'
        ]);

        DB::table('orders')->insert([
            'user_id' => '1',
            'stock_ean' => '7440830185127',
            'quantity' => '20',
            'order_date' => '2019-06-03 13:34:04'
        ]);


        DB::table('orders')->insert([
            'user_id' => '1',
            'stock_ean' => '7440830186148',
            'quantity' => '5',
            'order_date' => '2019-06-30 13:34:04'
        ]);

        DB::table('orders')->insert([
            'user_id' => '1',
            'stock_ean' => '7440830186148',
            'quantity' => '12',
            'order_date' => '2019-07-01 13:34:04'
        ]);

        DB::table('orders')->insert([
            'user_id' => '1',
            'stock_ean' => '7440830186148',
            'quantity' => '15',
            'order_date' => '2019-07-02 13:34:04'
        ]);

        DB::table('orders')->insert([
            'user_id' => '1',
            'stock_ean' => '7440830186148',
            'quantity' => '20',
            'order_date' => '2019-06-03 13:34:04'
        ]);
    }
}

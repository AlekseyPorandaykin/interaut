<?php

use Illuminate\Database\Seeder;

class BidStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bid_statuses')->insert([
            'id' => 1,
            'bid_name' => 'Новая'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->insert([
            'name' => 'МОСКВА',
            'departure_city' => 1
        ]);
        DB::table('city')->insert([
            'name' => 'АСТРАХАНЬ',
            'city_receipt' => 1
        ]);
        DB::table('city')->insert([
            'name' => 'ВОЛГОГРАД',
            'city_receipt' => 1
        ]);
        DB::table('city')->insert([
            'name' => 'КРАСНОДАР',
            'city_receipt' => 1
        ]);
        DB::table('city')->insert([
            'name' => 'КРАСНОЯРСК',
            'city_receipt' => 1
        ]);
        DB::table('city')->insert([
            'name' => 'ТЮМЕНЬ',
            'city_receipt' => 1
        ]);
        DB::table('city')->insert([
            'name' => 'ЧЕЛЯБИНСК',
            'city_receipt' => 1
        ]);
    }
}

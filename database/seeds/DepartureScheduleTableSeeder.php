<?php

use Illuminate\Database\Seeder;

class DepartureScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departure_schedule')->insert([
            'number_departure' => 1,
            'date' => '30.06.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '05.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 2,
            'date' => '01.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '05.07.2017  9:52:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 3,
            'date' => '03.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '08.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 4,
            'date' => '05.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '10.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 5,
            'date' => '07.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '12.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 6,
            'date' => '09.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '14.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 7,
            'date' => '11.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '16.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 8,
            'date' => '13.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '18.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 9,
            'date' => '13.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '18.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 10,
            'date' => '17.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '22.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 11,
            'date' => '19.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '24.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 12,
            'date' => '21.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '26.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 13,
            'date' => '23.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '28.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 14,
            'date' => '25.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '30.07.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 15,
            'date' => '27.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '01.08.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
        DB::table('departure_schedule')->insert([
            'number_departure' => 16,
            'date' => '29.07.2017',
            'data_delivery' => 'Казанский, до 10:00',
            'receipt_data' => '03.08.2017  6:53:00',
            'departure_city' => 'МОСКВА',
            'city_receipt' => 'КРАСНОЯРСК'
        ]);
    }
}

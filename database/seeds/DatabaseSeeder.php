<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BidStatusesTableSeeder::class);
        $this->call(PackingTypesTableSeeder::class);
        $this->call(CityTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class PackingTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packing_types')->insert([
            'id' => 1,
            'packing_types_name' => 'На паллете'
        ]);
        DB::table('packing_types')->insert([
            'id' => 2,
            'packing_types_name' => 'Ммешок, короб'
        ]);
    }
}

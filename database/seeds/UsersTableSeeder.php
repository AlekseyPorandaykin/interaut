<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => '$2y$10$6yiEB.9/QVZ5MOr8LvxcvutcloqvvoKV6dafeS/ZOn9Ybushh7faq', /* 123456 */

        ]);
    }
}

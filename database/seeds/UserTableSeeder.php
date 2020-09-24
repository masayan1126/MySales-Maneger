<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
              'name' => 'matsushin',
              'email' => 'matsushin@gmail.com',
              'password' => 'matsushin1126',
              'role' => 1,
            ],
          ]);
    }
}

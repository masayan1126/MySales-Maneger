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
              'email' => 'matsushin1126@gmail.com',
              'password' => Hash::make('matsushin1126'),
              'role' => 1,
              'created_at' => '2020-09-01 10:00:00',
            ],
          ]);
    }
}

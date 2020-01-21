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
        // $this->call(UsersTableSeeder::class);
         DB::table('users')->insert([
            'name' => 'Admin1',
            'username' => 'adminnkl1',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin2',
            'username' => 'adminnkl2',
            'password' => bcrypt('password'),
        ]);
    }
}
    
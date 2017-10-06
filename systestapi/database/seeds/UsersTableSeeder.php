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
            'name' => 'Admin User',
            'email' => 'admin@xyz.com',
            'password' => bcrypt('password'),
            'user_role_id' => 1 
        ]);

       	DB::table('users')->insert([
            'id' => 2,
            'name' => 'Normal User',
            'email' => 'normal@xyz.com',
            'password' => bcrypt('password'),
            'user_role_id' => 2
        ]);
       	 
    }
}

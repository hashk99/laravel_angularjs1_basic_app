<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       	DB::table('user_roles')->insert([
            'id' => 1,
            'role' => 'ADMIN',
            'readable_name' => 'System Admin'
        ]);

       	DB::table('user_roles')->insert([
            'id' => 2,
            'role' => 'NORMAL_USER',
            'readable_name' => 'Normal User' 
        ]);
 
    }
}

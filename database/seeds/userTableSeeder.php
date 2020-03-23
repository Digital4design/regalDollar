<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $userData = array(
            array(
                'id' => 1,
                'first_name'=>'Admin',
                'last_name'=>'Admin',
                'name' => 'Admin',
                'last_name' => 'Dev',
                'email' => 'testdigital4design@gmail.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => bcrypt('qwert@123'),
                'remember_token' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ),
        );
        DB::table('users')->insert($userData);
    }
}

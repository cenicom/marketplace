<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'luis eduardo gonzalez vargas',
                'email' => 'luedgova1967@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$lUzFcZJsb0pCmhs7W4.80OaILLEpTUhWRGvHekCtueeEQFfCJGN8q',
                'remember_token' => 'xNsRx2XjmEQdoCDPPCsXroITVJPbaj0ZpQ2bXVf6Q5yXOi7XHu7YLjgj31xI',
                'settings' => NULL,
                'created_at' => '2021-11-16 22:13:02',
                'updated_at' => '2021-11-24 10:25:32',
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'username'=>'admin',
                'name' => 'Nga Nguyen',
                'email'=>'admin@123',
                'role'=>'admin',
                'address'=>'Quang Binh',
                'money'=>20000,
                'phoneNumber'=>'0934 343 533',
                'password'=>Hash::make("123"),
        
            ],
            [
                'username'=>'user',
                'name' => 'Dai Tran',
                'email'=>'user@123',
                'role'=>'user',
                'address'=>'Da Nang',
                'money'=>20000,
                'phoneNumber'=>'0934 343 543',
                'password'=>Hash::make("123"),
               
            ]

        ]);  
    }
}

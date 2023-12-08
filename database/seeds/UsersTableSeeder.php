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
        $data = [
            ['name'=>'ridwan','email'=>'ridwan@gmail.com','password'=>Hash::make('ridwan')],
            ['name'=>'noor','email'=>'noor@gmail.com','password'=>Hash::make('noor')],
           
        ];

        foreach($data as $d){
            DB::table('users')->insert([
                'name' => $d['name'],
                'email' => $d['email'],
                'password' => $d['password'],               
            ]);
        }
        
      
    }
}

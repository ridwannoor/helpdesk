<?php

use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = [
        //     ['nama_perusahaan'=>'PT IAS Property Indonesia','email'=>'approperti@gmail.com','address'=>'Jl. Selangit Blok B.9 No.7','image'=>'','phone'=>'087788518142']
           
        // ];

        // foreach($data as $d){
            DB::table('preferences')->insert([
                'nama_perusahaan' => 'PT Angkasapura Properti',
                'email' => 'approperti@gmail.com',
                'address' => 'Jl. Selangit Blok B9 No.7',
                'image' => '',
                'phone' => '087788518142'               
            ]);
        // }
    }
}

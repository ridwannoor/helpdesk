<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode'=>'C001','detail'=>'Kontraktor'],
            ['kode'=>'C002','detail'=>'Konsultan'],
            ['kode'=>'C003','detail'=>'Supplier'],   
        ];

        foreach($data as $d){
            DB::table('categories')->insert([
                'kode' => $d['kode'],
                'detail' => $d['detail'],           
            ]);
        }
    }
}

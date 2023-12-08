<?php

use Illuminate\Database\Seeder;

class BadanusahasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode'=>'PT','detail'=>'Perseroan Terbatas'],
            ['kode'=>'Perseorangan','detail'=>'Perusahaan Perseorangan'],
            ['kode'=>'CV','detail'=>'Commanditaire Vennootschap'],
            ['kode'=>'UD','detail'=>'Usaha Dagang'],
            ['kode'=>'Persero','detail'=>'Perseroan Terbatas Negara']          
        ];

        foreach($data as $d){
            DB::table('badanusahas')->insert([
                'kode' => $d['kode'],
                'detail' => $d['detail'],           
            ]);
        }
    }
}

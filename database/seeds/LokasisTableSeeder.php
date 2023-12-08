<?php

use Illuminate\Database\Seeder;

class LokasisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode'=>'DPS','detail'=>'Denpasar'],
            ['kode'=>'BPN','detail'=>'Balikpapan'],
            ['kode'=>'UPG','detail'=>'Makassar'],
            ['kode'=>'AMQ','detail'=>'Ambon'],
            ['kode'=>'KOE','detail'=>'Kupang'],
            ['kode'=>'BIK','detail'=>'Biak'],
            ['kode'=>'JOG','detail'=>'Yogyakarta'],
            ['kode'=>'SRG','detail'=>'Semarang'],
            ['kode'=>'SOC','detail'=>'Solo'],
            ['kode'=>'YIA','detail'=>'Kulonprogo'],
            ['kode'=>'JKT','detail'=>'Jakarta'],
            ['kode'=>'MDC','detail'=>'Manado'],
            ['kode'=>'BDJ','detail'=>'Banjarmasin'],
            ['kode'=>'SUB','detail'=>'Surabaya'],           
        ];

        foreach($data as $d){
            DB::table('lokasis')->insert([
                'kode' => $d['kode'],
                'detail' => $d['detail'],           
            ]);
        }
    }
}

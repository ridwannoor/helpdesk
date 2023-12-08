<?php

use Illuminate\Database\Seeder;

class JenisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode'=>'Perusahaan perseorangan','detail'=>'Perusahaan perseorangan'],
            ['kode'=>'Firma','detail'=>'Firma'],
            ['kode'=>'CV','detail'=>'Persekutuan Komanditer'],
            ['kode'=>'PT ','detail'=>'Perseroan Terbatas'],
            ['kode'=>'Persero ','detail'=>'Perseroan Terbatas Negara'],
            ['kode'=>'PD ','detail'=>'Perusahaan Daerah'],
            ['kode'=>'Perum ','detail'=>'Perusahaan Negara Umum'],
            ['kode'=>'Perjan ','detail'=>'Perusahaan Negara Jawatan'],      
        ];

        foreach($data as $d){
            DB::table('jenis')->insert([
                'kode' => $d['kode'],
                'detail' => $d['detail'],           
            ]);
        }
    }
}

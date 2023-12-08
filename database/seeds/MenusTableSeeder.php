<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['parentmenu'=>'','deskripsi'=>'Vendor','icon'=>'', 'link'=>'/vendor'],
            ['parentmenu'=>'','deskripsi'=>'Preference','icon'=>'', 'link'=>'/preference'],
            ['parentmenu'=>'','deskripsi'=>'Delivery Order','icon'=>'', 'link'=>'/do'],
            ['parentmenu'=>'','deskripsi'=>'Rekap PO','icon'=>'', 'link'=>'/rekappo'],
            ['parentmenu'=>'','deskripsi'=>'Good Receive','icon'=>'', 'link'=>'/receivedo'],
            ['parentmenu'=>'','deskripsi'=>'Rekap DO','icon'=>'', 'link'=>'/rekapdo'],
            ['parentmenu'=>'','deskripsi'=>'User','icon'=>'', 'link'=>'/user'],  
            ['parentmenu'=>'','deskripsi'=>'Barang','icon'=>'', 'link'=>'/barang'], 
            ['parentmenu'=>'','deskripsi'=>'Harga Barang','icon'=>'', 'link'=>'/hargabarang'], 
        ];

        foreach($data as $d){
            DB::table('menus')->insert([
                'parentmenu' => $d['parentmenu'], 
                'deskripsi' => $d['deskripsi'],
                'icon' => $d['icon'],    
                'link' => $d['link'],                        
            ]);
        }
    }
}

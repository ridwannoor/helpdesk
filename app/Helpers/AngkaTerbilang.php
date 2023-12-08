<?php




function terbilang($angka) {
   $angka=abs($angka);
   $baca =array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
 
   $terbilang="";
    if ($angka < 12){
        $terbilang= " " . $baca[$angka];
    }
    else if ($angka < 20){
        $terbilang= terbilang($angka - 10) . " belas";
    }
    else if ($angka < 100){
        $terbilang= terbilang($angka / 10) . " puluh" . terbilang($angka % 10);
    }
    else if ($angka < 200){
        $terbilang= " seratus" . terbilang($angka - 100);
    }
    else if ($angka < 1000){
        $terbilang= terbilang($angka / 100) . " ratus" . terbilang($angka % 100);
    }
    else if ($angka < 2000){
        $terbilang= " seribu" . terbilang($angka - 1000);
    }
    else if ($angka < 1000000){
        $terbilang= terbilang($angka / 1000) . " ribu" . terbilang($angka % 1000);
    }
    else if ($angka < 1000000000){
       $terbilang= terbilang($angka / 1000000) . " juta" . terbilang($angka % 1000000);
    }
    else if ($angka < 1000000000000){
        $terbilang= terbilang($angka / 1000000000) . " milyar" . terbilang(fmod($angka,1000000000));
    } 
    else if ($angka < 1000000000000000) {
        $terbilang = terbilang($angka / 1000000000000) . " trilyun" . terbilang(fmod($angka,1000000000000));
    }  
       return $terbilang;
}

function comma($x)
    {
        $x = stristr($x,'.');
        $angka = array(
        "nol",
        "satu",
        "dua",
        "tiga",
        "empat",
        "lima",
        "enam",
        "tujuh",
        "delapan",
        "sembilan");
        $results = "";
        $length = strlen($x);
        $i = 1;
        while($i < $length)
        {
            $get = substr($x,$i,1);
            $i++;
            $results .= " ".$angka[$get];
           
        }
        return $results;
    }


function kekata($x) {
    if($x < 0) {
        $hasilkoma = "minus" . trim(terbilang($x));
    }

    else{
        $poin = trim(comma($x));
        $hasilkoma = trim(terbilang($x));
    }
    if ($poin) {
        $hasilkoma = ucwords($hasilkoma). ' Koma ' . ucwords($poin);
    }
    else {
        $hasilkoma = ucwords($hasilkoma);
    }
    // switch ($style) {
    //     case 1:
    //         if ($poin) {
    //                 $hasilkoma = strtoupper($hasilkoma). ' koma ' . strtoupper($poin);
    //         }
    //         else {
    //             $hasilkoma = strtoupper($hasilkoma);
    //         }
    //         break;
    //     case 2:
    //         if ($poin) {
    //                 $hasilkoma = strtolower($hasilkoma). ' koma ' . strtolower($poin);
    //         }
    //         else {
    //             $hasilkoma = strtolower($hasilkoma);
    //         }
    //         break;
    //     case 3:
    //         if ($poin) {
    //                 $hasilkoma = ucwords($hasilkoma). ' koma ' . ucwords($poin);
    //         }
    //         else {
    //             $hasilkoma = ucwords($hasilkoma);
    //         }
    //         break;
    //     default:
    //         if ($poin) {
    //             $hasilkoma = ucfirst($hasilkoma). ' koma ' . ucfirst($poin);
    //         }
    //         else {
    //             $hasilkoma = ucfirst($hasilkoma);
    //         }
    //         break;
    // }
    return $hasilkoma;
}
<?php
function DateToIndo($date) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April",
    "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
    "November", "Desember");
    
    // memisahkan format tahun menggunakan substring
    $tahun = substr($date, 0, 4);
    
    // memisahkan format bulan menggunakan substring
    $bulan = substr($date, 5, 2);
    
    // memisahkan format tanggal menggunakan substring
    $tgl = substr($date, 8, 2);
    
    $result = $tgl . " " . $BulanIndo[(int)$bulan] . " ". $tahun;
    
    return($result);
    }
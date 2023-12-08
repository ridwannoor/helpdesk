<?php
use Carbon\Carbon;
 
function tglIndo($tgl)
{
    $tgl = new Carbon($tgl);
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US');
    return $tgl->formatLocalized('%d %B %Y');
}

function hariIndo ($hariInggris) {
    switch ($hariInggris) {
      case 'Sunday':
        return 'minggu';
      case 'Monday':
        return 'senin';
      case 'Tuesday':
        return 'selasa';
      case 'Wednesday':
        return 'rabu';
      case 'Thursday':
        return 'kamis';
      case 'Friday':
        return 'jumat';
      case 'Saturday':
        return 'sabtu';
      default:
        return 'hari tidak valid';
    }
  }

  function bulanIndo ($bulanInggris) {
    switch ($bulanInggris) {
      case 'January':
        return 'januari';
      case 'February':
        return 'februari';
      case 'March':
        return 'maret';
      case 'April':
        return 'april';
      case 'May':
        return 'mei';
      case 'June':
        return 'juni';
      case 'July':
        return 'juli';
        case 'August':
          return 'agustus';
        case 'September':
          return 'september';
        case 'October':
          return 'oktober';
        case 'November':
          return 'nopember';
          case 'December':
            return 'desember';
      default:
        return 'bulan tidak valid';
    }
  }
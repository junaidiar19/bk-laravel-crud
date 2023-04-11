<?php

/**
 * Format rupiah
 */
if (! function_exists('rupiahFormat')) {    
  function rupiahFormat($str) 
  {
    return 'Rp. ' . number_format($str, '0', '', '.');
  }
}

/**
 * Format tanggal Indonesia
 */
if (! function_exists('formatTanggalIndo')) {
  function formatTanggalIndo($date)
  {
    if(!$date) {
        return '-';
    }

    $BulanIndo = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $result = $tgl . ' ' . $BulanIndo[(int) $bulan - 1] . ' ' . $tahun;
    return $result;
  }
}
<?php

function format_rupiah($angka) {
    $hasil = "Rp. ".number_format($angka, 0,'.', '.');
    return $hasil;
}

function DateToIndo($date) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April",
    "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
    "November", "Desember");

    $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
    $tanggalAkhir = date('Y-m-d');

    
    // memisahkan format tahun menggunakan substring
    $tahun = substr($date, 0, 4);
    
    // memisahkan format bulan menggunakan substring
    $bulan = substr($date, 5, 2);
    
    // memisahkan format tanggal menggunakan substring
    $tgl = substr($date, 8, 2);
    
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    
    return($result);
}
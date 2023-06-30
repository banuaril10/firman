<?php
date_default_timezone_set('Asia/Jakarta');
// error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
	$dbuser_lokal = 'root';
    $dbpass_lokal = '';
    $dbhost_lokal = 'localhost';
	$dbdinas='penjualan_motor';
	
    $connec = new PDO("mysql:host=$dbhost_lokal;dbname=$dbdinas", $dbuser_lokal, $dbpass_lokal);
  
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    die();

}

function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
 
}

function ribu($angka){
    
    $hasil_rupiah = number_format($angka,0,',','.');
    return $hasil_rupiah;
 
}
 
?>
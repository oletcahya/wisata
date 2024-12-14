<?php
$server     ="localhost";
$username   ="root";
$password   ="";
$db_name    ="web_wisata";

$koneksi = mysqli_connect($server,$username,$password,$db_name);

if(!$koneksi){
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>

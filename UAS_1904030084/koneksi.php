<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'uas_1904030084';

$conn = mysqli_connect($host, $user, $pass, $db); 

$result = mysqli_query($conn, 'SELECT * FROM anggota');
$result = mysqli_query($conn, 'SELECT * FROM buku');

// AMBIL DATA DARI TABEL CALON MHS
//mysqli_fetch_row();
//mysqli_fetch_assoc();
//mysqli_fetch_array();

mysqli_fetch_row($result);
var_dump(mysqli_fetch_row($result));
 ?>
<?php

// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "tele_blastv1";

// melakukan koneksi ke database
$konek = new mysqli($server,$username,$password,$database);
 
// cek koneksi yang kita lakukan berhasil atau tidak
 if ($konek->connect_error) {
    // jika terjadi error, matikan proses dengan die() atau exit();
    die('Maaf koneksi gagal: '. $konek->connect_error);
}
?>
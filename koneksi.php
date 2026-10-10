<?php

$koneksi = mysqli_connect("localhost", "root", "", "sekolah");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>
<?php
$koneksi = mysqli_connect("localhost", "root", "", "jadwal");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

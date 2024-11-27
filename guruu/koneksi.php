<?php 
$koneksi = mysqli_connect("localhost", "root", "", "jadwal"); // Gunakan password kosong jika belum mengatur password di MySQL

// Check connection
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    exit();
}
?>

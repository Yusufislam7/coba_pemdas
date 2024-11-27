<?php
include 'koneksi.php'; // Pastikan koneksi database benar

// Menangkap data dari form tambah hari
if (isset($_POST['hari_kode'], $_POST['hari_nama'])) {
    $hari_kode = $_POST['hari_kode'];
    $hari_nama = $_POST['hari_nama'];

    // Query untuk menyimpan data hari
    $query = "INSERT INTO hari (hari_kode, hari_nama) 
              VALUES ('$hari_kode', '$hari_nama')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: tampil_hari.php"); // Redirect ke halaman tampil_hari.php setelah berhasil
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak lengkap!";
}
?>

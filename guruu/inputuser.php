<?php
include 'koneksi.php'; // Pastikan koneksi database benar

// Menangkap data dari form tambah.php
if (isset($_POST['guru_id'], $_POST['guru_lahir'], $_POST['guru_gender'], $_POST['guru_aktif'])) {
    $guru_id = $_POST['guru_id'];
    $guru_lahir = $_POST['guru_lahir'];
    $guru_gender = $_POST['guru_gender'];
    $guru_aktif = $_POST['guru_aktif'];

    // Menggunakan prepared statement untuk mencegah SQL Injection
    $query = $koneksi->prepare("INSERT INTO guru (guru_id, guru_lahir, guru_gender, guru_aktif) 
                                VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $guru_id, $guru_lahir, $guru_gender, $guru_aktif);

    // Mengeksekusi query
    if ($query->execute()) {
        header("Location: tampil.php"); // Redirect ke halaman tampil.php setelah berhasil
        exit();
    } else {
        echo "Error: " . $query->error; // Menampilkan error jika gagal
    }

    $query->close(); // Menutup prepared statement
} else {
    echo "Data tidak lengkap!"; // Menampilkan error jika data yang dikirim tidak lengkap
}
?>

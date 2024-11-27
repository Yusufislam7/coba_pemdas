<?php
session_start();
include 'koneksi.php'; // Sesuaikan dengan file koneksi database Anda

// Fungsi untuk logout Guru
function logoutguru() {
    // Hapus semua data sesi
    session_unset();
    session_destroy();
}

// Jika Guru sedang login
if (isset($_SESSION['username'])) {
    // Panggil fungsi logoutguru
    logoutguru();

    // Redirect ke halaman login
    header("Location: login.php"); // Sesuaikan URL login Anda
    exit();
} else {
    // Jika tidak ada sesi aktif, langsung ke halaman login
    header("Location: login.php");
    exit();
}
?>

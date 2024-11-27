<?php
// Koneksi ke database
include 'koneksi.php';

// Mengecek apakah 'guru_id' dikirimkan melalui URL
if (isset($_GET['guru_id'])) {
    // Mengambil nilai guru_id dari URL dan mensanitasi input untuk mencegah SQL Injection
    $guru_id = mysqli_real_escape_string($koneksi, $_GET['guru_id']);

    // Memastikan guru_id tidak kosong
    if (!empty($guru_id)) {
        // Query untuk menghapus data dari database berdasarkan guru_id
        $query = "DELETE FROM guru WHERE guru_id='$guru_id'";  // Pastikan kolom yang digunakan adalah guru_id

        // Mengeksekusi query dan memeriksa hasilnya
        if (mysqli_query($koneksi, $query)) {
            // Jika berhasil, redirect ke halaman tampil.php
            header("Location: tampil.php");
            exit(); // Menghentikan eksekusi setelah redirect
        } else {
            // Menampilkan pesan error jika query gagal
            echo "Error deleting record: " . mysqli_error($koneksi);
        }
    } else {
        // Menampilkan pesan jika guru_id tidak valid (kosong)
        echo "ID Guru tidak valid!";
    }
} else {
    // Menampilkan pesan jika guru_id tidak ditemukan di URL
    echo "ID Guru tidak ditemukan!";
}
?>

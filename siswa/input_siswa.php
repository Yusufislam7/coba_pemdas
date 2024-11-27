<?php
include 'koneksi.php'; // Pastikan koneksi database benar

// Menangkap data dari form tambah siswa
if (isset($_POST['siswa_nama'], $_POST['siswa_lahir'], $_POST['siswa_gender'])) { // Hapus 'siswa_aktif'
    $siswa_nama = $_POST['siswa_nama'];
    $siswa_lahir = $_POST['siswa_lahir'];
    $siswa_gender = $_POST['siswa_gender'];

    // Query untuk menyimpan data siswa
    $query = "INSERT INTO siswa (siswa_nama, siswa_lahir, siswa_gender) 
              VALUES ('$siswa_nama', '$siswa_lahir', '$siswa_gender')"; // Hapus 'siswa_aktif'

    if (mysqli_query($koneksi, $query)) {
        header("Location: tampil_siswa.php"); // Redirect ke halaman tampil_siswa.php setelah berhasil
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak lengkap!";
}
?>

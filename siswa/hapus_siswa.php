<?php
include 'koneksi.php';

if (isset($_GET['siswa_id'])) {
    $siswa_id = mysqli_real_escape_string($koneksi, $_GET['siswa_id']);

    if (!empty($siswa_id)) {
        $query = "DELETE FROM siswa WHERE siswa_id='$siswa_id'";

        if (mysqli_query($koneksi, $query)) {
            header("Location: tampil_siswa.php"); // Redirect ke halaman tampil_siswa.php setelah berhasil
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($koneksi);
        }
    } else {
        echo "ID Siswa tidak valid!";
    }
} else {
    echo "ID Siswa tidak ditemukan!";
}
?>

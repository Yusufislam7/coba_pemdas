<?php
include 'koneksi.php';

if (isset($_GET['hari_kode'])) {
    $hari_kode = mysqli_real_escape_string($koneksi, $_GET['hari_kode']);

    if (!empty($hari_kode)) {
        $query = "DELETE FROM hari WHERE hari_kode='$hari_kode'";

        if (mysqli_query($koneksi, $query)) {
            header("Location: tampil_hari.php"); // Redirect ke halaman tampil_hari.php setelah berhasil
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($koneksi);
        }
    } else {
        echo "Kode Hari tidak valid!";
    }
} else {
    echo "Kode Hari tidak ditemukan!";
}
?>

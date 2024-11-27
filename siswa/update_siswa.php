<?php
include 'koneksi.php'; // Pastikan koneksi database benar

// Mengecek apakah data sudah dikirim dari form
if (isset($_POST['siswa_id'], $_POST['siswa_nama'], $_POST['siswa_lahir'], $_POST['siswa_gender'])) {
    $siswa_id = $_POST['siswa_id'];
    $siswa_nama = $_POST['siswa_nama'];
    $siswa_lahir = $_POST['siswa_lahir'];
    $siswa_gender = $_POST['siswa_gender'];

    // Query untuk update data siswa
    $query = "UPDATE siswa 
              SET siswa_nama='$siswa_nama', siswa_lahir='$siswa_lahir', siswa_gender='$siswa_gender' 
              WHERE siswa_id='$siswa_id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: tampil_siswa.php"); // Redirect ke halaman tampil.php
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak lengkap!";
}
?>

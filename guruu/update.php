<?php
include 'koneksi.php'; // Pastikan koneksi database benar

// Mengecek apakah data sudah dikirim dari form
if (isset($_POST['guru_id'], $_POST['guru_lahir'], $_POST['guru_gender'], $_POST['guru_aktif'])) {
    $guru_id = $_POST['guru_id'];
    $guru_lahir = $_POST['guru_lahir'];
    $guru_gender = $_POST['guru_gender'];
    $guru_aktif = $_POST['guru_aktif'];

    // Query untuk update data guru
    $query = "UPDATE guru 
              SET guru_lahir='$guru_lahir', guru_gender='$guru_gender', guru_aktif='$guru_aktif' 
              WHERE guru_id='$guru_id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: tampil.php"); // Redirect ke halaman tampil.php
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Data tidak lengkap!";
}
?>

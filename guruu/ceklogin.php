<?php 
session_start();
include 'koneksi.php'; // Pastikan koneksi.php benar

// Mengecek apakah form login sudah disubmit
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Menangkap data dari form login dan sanitasi input
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    // Query untuk mencari data pengguna berdasarkan username
    $data = mysqli_query($koneksi, "SELECT * FROM guru WHERE username='$username'");

    // Memeriksa apakah query berhasil
    if ($data) {
        $cek = mysqli_num_rows($data); // Menghitung jumlah baris yang ditemukan
        
        if ($cek > 0) {
            // Mengambil data pengguna yang ditemukan
            $row = mysqli_fetch_assoc($data);
            
            // Memeriksa apakah password yang dimasukkan cocok dengan password di database (plaintext)
            if ($password == $row['password']) {
                // Jika login berhasil, simpan informasi session
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login";
                header("location:tampil.php"); // Redirect ke halaman tampil.php
                exit();
            } else {
                // Jika password tidak cocok
                echo "<script> alert ('Login gagal! Username atau password tidak benar.');</script>";
                echo "<script> window.location ='login.php';</script>";
                exit();
            }
        } else {
            // Jika username tidak ditemukan
            echo "<script> alert ('Login gagal! Username atau password tidak benar.');</script>";
            echo "<script> window.location ='login.php';</script>";
            exit();
        }
    } else {
        // Jika query gagal
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika form tidak disubmit
    echo "<script> alert ('Harap isi semua kolom!');</script>";
    echo "<script> window.location ='login.php';</script>";
}
?>

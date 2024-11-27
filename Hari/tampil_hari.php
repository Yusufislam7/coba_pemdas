<?php
session_start();
include 'koneksi.php'; // Pastikan koneksi.php benar

// Mengecek apakah sudah login
if ($_SESSION['status'] != "login") {
    header("location:login.php"); // Redirect ke login jika belum login
    exit();
}

// Query untuk menampilkan data hari
$data = mysqli_query($koneksi, "SELECT * FROM hari");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Hari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3 class="text-center">Data Hari</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Hari</th>
                    <th>Nama Hari</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                    // Menampilkan data
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$d['hari_kode']}</td>
                            <td>{$d['hari_nama']}</td>
                            <td>
                                <a role='button' class='btn btn-info' href='ubah_hari.php?hari_kode={$d['hari_kode']}'>UBAH</a>
                                <a role='button' class='btn btn-danger' href='hapus_hari.php?hari_kode={$d['hari_kode']}'>HAPUS</a>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
        <a href="tambah_hari.php" class="btn btn-primary">Tambah Data Hari</a>
        <a href="tampil.php" class="btn btn-secondary">Kembali ke Data Guru</a>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
</body>
</html>

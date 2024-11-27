<?php
session_start();
include 'koneksi.php'; // Pastikan koneksi.php benar

// Mengecek apakah sudah login
if ($_SESSION['status'] != "login") {
    header("location:login.php"); // Redirect ke login jika belum login
    exit();
}

// Query untuk menampilkan data siswa
$data = mysqli_query($koneksi, "SELECT * FROM siswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="text-center">Data Siswa</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Siswa ID</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Gender</th>
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
                            <td>{$d['siswa_id']}</td>
                            <td>{$d['siswa_nama']}</td>
                            <td>{$d['siswa_lahir']}</td>
                            <td>" . ($d['siswa_gender'] == 'L' ? 'Laki-laki' : 'Perempuan') . "</td>
                            <td>
                                <a role='button' class='btn btn-info' href='ubah_siswa.php?siswa_id={$d['siswa_id']}'>UBAH</a>
                                <a role='button' class='btn btn-danger' href='hapus_siswa.php?siswa_id={$d['siswa_id']}'>HAPUS</a>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
        <a href="tambah_siswa.php" class="btn btn-primary">Tambah Data Siswa</a>
        <a href="tampil.php" class="btn btn-secondary">Kembali ke Data Guru</a>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
</body>
</html>

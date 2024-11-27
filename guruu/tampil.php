<?php
session_start();
include 'koneksi.php'; // Pastikan koneksi.php benar

// Mengecek apakah sudah login
if ($_SESSION['status'] != "login") {
    header("location:login.php"); // Redirect ke login jika belum login
    exit();
}

// Query untuk menampilkan data guru
$data = mysqli_query($koneksi, "SELECT * FROM guru");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="text-center">Data Guru</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Guru ID</th>
                    <th>Tanggal Lahir</th>
                    <th>Gender</th>
                    <th>Status Aktif</th>
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
                            <td>{$d['guru_id']}</td>
                            <td>{$d['guru_lahir']}</td>
                            <td>" . ($d['guru_gender'] == 'L' ? 'Laki-laki' : 'Perempuan') . "</td>
                            <td>{$d['guru_aktif']}</td>
                            <td>
                                <a role='button' class='btn btn-info' href='ubah.php?guru_id={$d['guru_id']}'>UBAH</a>
                                <a role='button' class='btn btn-danger' href='hapus.php?guru_id={$d['guru_id']}'>HAPUS</a>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
        
        <!-- Tombol untuk menuju ke halaman siswa -->
        <!-- Periksa URL di sini -->
        <a href="http://localhost:8081/siswa/tampil_siswa.php" class="btn btn-success">Lihat Data Siswa</a>

        <!-- Tombol untuk menuju ke halaman hari -->
        <a href="http://localhost:8081/hari/tampil_hari.php" class="btn btn-warning">Lihat Data Hari</a>

        <!-- Tombol untuk tambah data guru -->
        <a href="tambah.php" class="btn btn-primary">Tambah Data Guru</a>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
</body>
</html>

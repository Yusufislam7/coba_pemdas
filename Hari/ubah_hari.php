<?php
include 'koneksi.php'; // Pastikan koneksi database benar

// Ambil hari_kode dari URL
$hari_kode = $_GET['hari_kode'];

// Query untuk mengambil data berdasarkan hari_kode
$data = mysqli_query($koneksi, "SELECT * FROM hari WHERE hari_kode='$hari_kode'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Hari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3 class="text-center">Ubah Data Hari</h3>
        <form method="post" action="update_hari.php">
            <input type="hidden" name="hari_kode" value="<?= $row['hari_kode'] ?>">
            <table class="table">
                <tr>
                    <td>Nama Hari</td>
                    <td><input class="form-control" type="text" name="hari_nama" value="<?= $row['hari_nama'] ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="tampil_hari.php" class="btn btn-secondary">Batal</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

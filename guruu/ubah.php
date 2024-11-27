<?php
include 'koneksi.php'; // Pastikan koneksi database benar

// Ambil guru_id dari URL
$guru_id = $_GET['guru_id'];

// Query untuk mengambil data berdasarkan guru_id
$data = mysqli_query($koneksi, "SELECT * FROM guru WHERE guru_id='$guru_id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3 class="text-center">Ubah Data Guru</h3>
        <form method="post" action="update.php">
            <input type="hidden" name="guru_id" value="<?= $row['guru_id'] ?>">
            <table class="table">
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input class="form-control form-control-lg" type="date" name="guru_lahir" value="<?= $row['guru_lahir'] ?>" required></td>
                </tr>
                <tr>
                    <td>Guru Gender</td>
                    <td>
                        <select class="form-control form-control-lg" name="guru_gender" required>
                            <option value="L" <?= $row['guru_gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= $row['guru_gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Status Aktif</td>
                    <td>
                        <select class="form-control form-control-lg" name="guru_aktif" required>
                            <option value="Aktif" <?= $row['guru_aktif'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="Tidak Aktif" <?= $row['guru_aktif'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="tampil.php" class="btn btn-secondary">Batal</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

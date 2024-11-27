<?php
include 'koneksi.php'; // Pastikan koneksi database benar

// Ambil siswa_id dari URL
if (isset($_GET['siswa_id'])) {
    $siswa_id = $_GET['siswa_id'];

    // Query untuk mengambil data berdasarkan siswa_id
    $data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE siswa_id='$siswa_id'");
    $row = mysqli_fetch_assoc($data);

    if (!$row) {
        echo "Data siswa tidak ditemukan!";
        exit();
    }
} else {
    echo "ID Siswa tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3 class="text-center">Ubah Data Siswa</h3>
        <form method="post" action="update_siswa.php">
            <input type="hidden" name="siswa_id" value="<?= $row['siswa_id'] ?>">
            <table class="table">
                <tr>
                    <td>Nama Siswa</td>
                    <td><input class="form-control form-control-lg" type="text" name="siswa_nama" value="<?= $row['siswa_nama'] ?>" required></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input class="form-control form-control-lg" type="date" name="siswa_lahir" value="<?= $row['siswa_lahir'] ?>" required></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <select class="form-control form-control-lg" name="siswa_gender" required>
                            <option value="L" <?= $row['siswa_gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= $row['siswa_gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="tampil_siswa.php" class="btn btn-secondary">Batal</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

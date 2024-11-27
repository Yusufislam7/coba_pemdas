<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Hari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3 class="text-center">Tambah Data Hari</h3>
        <form method="POST" action="input_hari.php">
            <table class="table">
                <tr>
                    <td>Kode Hari</td>
                    <td><input class="form-control" type="text" name="hari_kode" maxlength="1" required></td>
                </tr>
                <tr>
                    <td>Nama Hari</td>
                    <td><input class="form-control" type="text" name="hari_nama" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="tampil_hari.php" class="btn btn-secondary">Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

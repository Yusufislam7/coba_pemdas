<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <h3 class="text-center">Tambah Data Guru</h3>
        <form method="post" action="inputuser.php">
            <table class="table">
                <tr>
                    <td>Guru ID</td>
                    <td><input class="form-control form-control-lg" type="text" name="guru_id" required></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input class="form-control form-control-lg" type="date" name="guru_lahir" required></td>
                </tr>
                <tr>            
                    <td>Guru Gender</td>
                    <td>
                        <select class="form-control form-control-lg" name="guru_gender" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Status Aktif</td>
                    <td>
                        <select class="form-control form-control-lg" name="guru_aktif" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="tampil.php" class="btn btn-success">Tampil</a>
                        </div>
                    </td>
                </tr>        
            </table>
        </form>
    </div>
</body>
</html>

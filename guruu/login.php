<?php
session_start();

// Jika sudah login, langsung diarahkan ke tampil.php
if (isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
    header("location: tampil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #89ABE3FF, #FCF6F5FF);
            min-height: 100vh;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <div class="card shadow-sm p-4" style="width: 22rem;">
        <h3 class="text-center mb-4">Login</h3>
        <!-- Form login -->
        <form method="POST" action="ceklogin.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username Anda" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Anda" required>
                <!-- Show/Hide Password -->
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" id="showPassword" onclick="togglePassword()">
                    <label class="form-check-label" for="showPassword">Tampilkan password</label>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Login</button>
            </div>
        </form>

        <!-- Error message jika login gagal -->
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 text-center">
                Login gagal! Username atau password salah.
            </div>
        <?php } ?>
    </div>

    <!-- JavaScript untuk toggle password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordType = passwordInput.getAttribute('type');
            passwordInput.setAttribute('type', passwordType === 'password' ? 'text' : 'password');
        }
    </script>

</body>
</html>
        
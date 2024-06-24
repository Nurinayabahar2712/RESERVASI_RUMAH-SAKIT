<?php
require 'koneksi.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn, "SELECT * FROM db_user WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    
    if (mysqli_num_rows($result) > 0) {
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["role"] = $row["role"]; // Simpan peran pengguna di sesi
            
            if ($row["role"] == 'admin') {
                header("location: admin_dashboard.php");
            } else if ($row["role"] == 'user') {
                header("location: user_dashboard.php");
            } else {
                header("location: index.html");
            }
        } else {
            echo "<script> alert('Password Anda Salah'); </script>";
        }
    } else {
        echo "<script> alert('Pengguna Tidak Ditemukan'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="registrasi.css" />
    <title>Login</title>
</head>
<body>
<form class="wrapper" action="" method="post" autocomplete="off">
        <h2>Login</h2>
        <div class="input-box">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Masukkan Email Anda" class="form-input" required value=""/>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password Anda" required value=""/>
            <i class='bx bxs-lock-alt' id="togglePassword"></i>
        </div>
        <div>
            <button type="submit" name="submit">Login</button>
        </div>
        <div class="bottom">
            <p>Belum Punya Akun?
                <a href="registrasi.php">Registrasi Disini</a>
            </p>
        </div>
    </form>

    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('bx-show'); // Optional: toggle icon class if you have different icon for show/hide
        });
    </script>
</body>
</html>

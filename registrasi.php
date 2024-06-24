<?php
require 'koneksi.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$message = '';

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmasipassword = $_POST["confirmasipassword"];
    $alamat = $_POST["alamat"];
    $usia = $_POST["usia"];
    $no_HP = $_POST["no_HP"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    // Cek apakah email sudah digunakan
    $duplicate = mysqli_query($conn, "SELECT * FROM db_user WHERE email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        $message = "Email sudah digunakan";
    } else {
        if ($password == $confirmasipassword) {
            // Hash password sebelum menyimpannya ke database
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO db_user (nama, username, password, alamat, usia, no_HP, jenis_kelamin, email, role) VALUES ('$nama', '$username', '$passwordHash', '$alamat', '$usia', '$no_HP', '$jenis_kelamin', '$email', '$role')";
            if (mysqli_query($conn, $query)) {
                // Set sesi pengguna
                $_SESSION['nama'] = $nama;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
                $_SESSION['login'] = true;

                // Pengalihan halaman berdasarkan role
                if ($role == 'admin') {
                    header("Location: admin_dashboard.php");
                } elseif ($role == 'user') {
                    header("Location: user_dashboard.php");
                }
                exit;
            } else {
                $message = "Registrasi gagal. Silakan coba lagi.";
            }
        } else {
            $message = "Password tidak cocok";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" type="text/css" href="registrasi.css" />
</head>
<body>
    <form action="" method="post" autocomplete="off">
        <fieldset>
            <legend>Registrasi</legend>
            <?php if ($message != ''): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <div>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Anda" required />
            </div>
            <div>
                <label for="username">Nomor KTP</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
            </div>
            <div>
                <label for="confirmasipassword">Konfirmasi Password</label>
                <input type="password" id="confirmasipassword" name="confirmasipassword" required />
            </div>
            <div>
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" required />
            </div>
            <div>
                <label for="usia">Usia</label>
                <input type="text" name="usia" id="usia" required />
            </div>
            <div>
                <label for="no_HP">Nomor Handphone (WA)</label>
                <input type="text" name="no_HP" id="no_HP" required />
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="contoh@gmail.com" required />
            </div>
            <div>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <div class="flex">
                    <input type="radio" name="jenis_kelamin" value="L" id="l" required /> <span>Laki-Laki</span>
                    <input type="radio" name="jenis_kelamin" value="P" id="p" required /> <span>Perempuan</span>
                </div>
            </div>
            <div>
                <label for="role">Role</label>
                <select id="role" name="role" class="role-select" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div>
                <button type="submit" name="submit">Registrasi</button>
            </div>
            <div class="bottom">
                <p>Sudah Punya Akun? <a href="login.php">Login Disini</a></p>
            </div>
            
            
        </fieldset>
    </form>
</body>
</html>

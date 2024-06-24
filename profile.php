<?php
session_start();

require 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

// Periksa apakah pengguna adalah admin atau user
if ($_SESSION["role"] == 'admin' || $_SESSION["role"] == 'user') {
    $query = mysqli_query($conn, "SELECT * FROM db_user WHERE id = '{$_SESSION["id"]}'");
    $profile = mysqli_fetch_assoc($query);
} else {
    // Jika peran tidak sesuai, redirect ke halaman yang sesuai
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-container">
        <a href="<?php echo $_SESSION['role'] == 'admin' ? 'admin_dashboard.php' : 'user_dashboard.php'; ?>" class="close-button">&times;</a>
        <h2>Profil</h2>
        <div class="profile-info">
            <div class="profile-item"><strong>Nama:</strong><span><?php echo $profile['nama']; ?></span></div>
            <div class="profile-item"><strong>Email:</strong><span><?php echo $profile['email']; ?></span></div>
            <div class="profile-item"><strong>Nomor KTP:</strong><span><?php echo $profile['username']; ?></span></div>
            <div class="profile-item"><strong>Alamat:</strong><span><?php echo $profile['alamat']; ?></span></div>
            <div class="profile-item"><strong>Usia:</strong><span><?php echo $profile['usia']; ?></span></div>
            <div class="profile-item"><strong>Nomor Handphone:</strong><span><?php echo $profile['no_HP']; ?></span></div>
            <div class="profile-item"><strong>Jenis Kelamin:</strong><span><?php echo $profile['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></span></div>
        </div>
        <div class="button-container">
            <button onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>
</body>
</html>

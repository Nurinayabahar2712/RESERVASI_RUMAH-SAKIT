<?php
require 'koneksi.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$message = '';

if (isset($_POST["submit"])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];
    $email = $_POST['email'];
    $gambar = $_FILES['gambar'];

    // Direktori tujuan penyimpanan gambar
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($gambar["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file adalah gambar asli atau tidak
    $check = getimagesize($gambar["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $message .= "File bukan gambar. ";
        $uploadOk = 0;
    }

    // Periksa apakah file sudah ada
    if (file_exists($target_file)) {
        $message .= "Maaf, file sudah ada. ";
        $uploadOk = 0;
    }

    // Batasi ukuran file gambar (contoh: 600KB)
    if ($gambar["size"] > 600000) {
        $message .= "Maaf, ukuran file terlalu besar. ";
        $uploadOk = 0;
    }

    // Batasi format file gambar yang diperbolehkan
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_ext)) {
        $message .= "Maaf, hanya format JPG, JPEG, PNG & GIF yang diperbolehkan. ";
        $uploadOk = 0;
    }

    // Debug informasi file
    error_log("Upload info: " . print_r($gambar, true));
    error_log("Ekstensi file: " . $imageFileType);
    error_log("Ukuran file: " . $gambar["size"]);

    // Periksa apakah uploadOk bernilai 0 karena kesalahan
    if ($uploadOk == 0) {
        $message .= "Maaf, file Anda tidak terupload.";
    } else {
        if (move_uploaded_file($gambar["tmp_name"], $target_file)) {
            $message = "File " . htmlspecialchars(basename($gambar["name"])) . " telah terupload.";

            // Masukkan data ke database termasuk nama file gambar
            $sql = "INSERT INTO dbrs (nama, alamat, noHP, email, gambar)
            VALUES ('$nama', '$alamat', '$noHP', '$email', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                header('Location: daftarRS_admin.php');
                exit();
            } else {
                $message .= "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $message .= "Maaf, terjadi kesalahan saat mengupload file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Rumah Sakit</title>
    <link rel="stylesheet" type="text/css" href="tambahRS_admin.css" />
</head>
<body>
    <div class="container">
        <form action="tambahRS_admin.php" method="POST" enctype="multipart/form-data">
        <legend>Tambah Rumah Sakit</legend>
        <?php if ($message != '') echo "<p>$message</p>"; ?>
            <div>
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required><br>
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" required /><br>
                <label for="noHP">Telepon</label>
                <input type="text" id="noHP" name="noHP" required><br>
                <label for="email">Email</label>
                <input type="text" id="email" name="email"><br>
                <label for="gambar">Gambar</label>
                <input type="file" id="gambar" name="gambar" accept="image/*"><br>
                
                <div class="button-container">
                <button type="submit" name="submit">Tambah</button>
                <button type="button" class="cancel-button" onclick="window.location.href='daftarRS_admin.php'">Batal</button>
            </div>
            </div>
        </form>
    </div>
</body>
</html>

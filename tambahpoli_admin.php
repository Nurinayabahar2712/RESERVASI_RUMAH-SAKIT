<?php
include 'koneksi.php';

// Ambil daftar rumah sakit untuk dropdown
$dbrs_sql = "SELECT * FROM dbrs";
$dbrs_result = mysqli_query($conn, $dbrs_sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dbrs_id = $_POST['dbrs_id'];
    $name = $_POST['name'];

    $sql = "INSERT INTO poli (dbrs_id, name) VALUES ('$dbrs_id', '$name')";
    if (mysqli_query($conn, $sql)) {
        $message = "Data Poli berhasil ditambahkan";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Poli</title>
    <link rel="stylesheet" type="text/css" href="registrasi.css" />
</head>
<body>
    <div class="container">
        <form action="tambahPoli_admin.php" method="POST">
        <legend>Tambah Poli</legend>
        <?php if (isset($message)) echo "<p>$message</p>"; ?>
            <label for="dbrs_id">Nama Rumah Sakit:</label>
            <select id="dbrs_id" name="dbrs_id" required>
                <?php
                while ($row = mysqli_fetch_assoc($dbrs_result)) {
                    echo "<option value='".$row['id']."'>".$row['nama']."</option>";
                }
                ?>
            </select><br>

            <label for="name">Nama Poli:</label>
            <input type="text" id="name" name="name" required><br>

            <div class="button-container">
                <button type="submit" name="submit">Tambah</button>
                <button type="button" class="cancel-button" onclick="window.location.href='admin_poli.php'">Batal</button>
            </div>
        </form>
    </div>
</body>
</html>


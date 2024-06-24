<?php
require 'koneksi.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST["submit"])) {
$id = $_GET['id'];
$sql = "SELECT * FROM dbRS WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Tidak ada data untuk rumah sakit ini.";
    exit;
}
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Rumah Sakit</title>
</head>
<body>
    <h1>Detail Rumah Sakit: <?php echo $row["name"]; ?></h1>
    <p>Alamat: <?php echo $row["address"]; ?></p>
    <p>Telepon: <?php echo $row["phone"]; ?></p>
    <p>Email: <?php echo $row["email"]; ?></p>
</body>
</html>
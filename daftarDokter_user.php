<?php
include 'koneksi.php';

// Ambil daftar dokter dari database
$sql = "SELECT d.*, r.nama as nama_rs, p.nama as nama_poli 
        FROM db_dokter d 
        JOIN dbrs r ON d.dbrs_id = r.id 
        JOIN poli p ON d.poli_id = p.id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Query Error: ' . mysqli_error($conn));
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dokter</title>
    <link rel="stylesheet" type="text/css" href="daftarDokter.css" />
</head>
<body>
    <div class="container">
        <h2>Daftar Dokter</h2>
        <div class="cards-container">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='card'>
                            <h3>{$row['nama']}</h3>
                            <p><strong>Alamat:</strong> {$row['alamat']}</p>
                            <p><strong>Telepon:</strong> {$row['telepon']}</p>
                            <p><strong>Email:</strong> {$row['email']}</p>
                            <p><strong>Rumah Sakit:</strong> {$row['nama_rs']}</p>
                            <p><strong>Poli:</strong> {$row['nama_poli']}</p>
                            <p><strong>Hari Pelayanan:</strong> {$row['hari_pelayanan']}</p>
                            <p><strong>Jam Pelayanan:</strong> {$row['jam_pelayanan']}</p>
                          </div>";
                }
            } else {
                echo "<p>Tidak ada data dokter.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>

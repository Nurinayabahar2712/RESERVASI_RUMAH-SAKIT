<?php
include 'koneksi.php';

// Ambil data antrian dari database
$sql = "SELECT r.no_antrian, r.tanggal_reservasi, rs.nama as nama_rs, p.nama as nama_poli, d.nama as nama_dokter 
        FROM reservasi r 
        JOIN dbrs rs ON r.dbrs_id = rs.id 
        JOIN poli p ON r.poli_id = p.id 
        JOIN db_dokter d ON r.dokter_id = d.id
        ORDER BY r.tanggal_reservasi, r.no_antrian";
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
    <title>Lihat Antrian</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="container">
        <h2>Daftar Antrian</h2>
        <table>
            <thead>
                <tr>
                    <th>No Antrian</th>
                    <th>Tanggal Reservasi</th>
                    <th>Rumah Sakit</th>
                    <th>Poli</th>
                    <th>Dokter</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['no_antrian']}</td>
                                <td>{$row['tanggal_reservasi']}</td>
                                <td>{$row['nama_rs']}</td>
                                <td>{$row['nama_poli']}</td>
                                <td>{$row['nama_dokter']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data antrian.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

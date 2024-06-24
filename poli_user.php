<?php
include 'koneksi.php';

// Ambil daftar poli dari database
$poli_sql = "SELECT p.id, p.name AS poli_name, d.nama AS rumah_sakit_name 
             FROM poli p 
             JOIN dbrs d ON p.dbrs_id = d.id";
$poli_result = mysqli_query($conn, $poli_sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Poli User</title>
    <link rel="stylesheet" type="text/css" href="daftarRS_admin.css" />
</head>
<body>
    <div class="container">
        <h2>Daftar Poli</h2>
        <table>
            <tr>
                <th>Nama Rumah Sakit</th>
                <th>Nama Poli</th>
            </tr>
            <?php
            if (mysqli_num_rows($poli_result) > 0) {
                while ($row = mysqli_fetch_assoc($poli_result)) {
                    echo "<tr>
                            <td>{$row['rumah_sakit_name']}</td>
                            <td>{$row['poli_name']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Tidak ada data poli.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

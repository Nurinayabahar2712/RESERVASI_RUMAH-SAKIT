<?php
// Include file koneksi ke database
require 'koneksi.php';

// Cek apakah pengguna adalah admin atau user
$isAdmin = false; // Misalnya, Anda dapat menetapkan nilai ini berdasarkan sesi atau status pengguna

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rumah Sakit</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Data Rumah Sakit</h1>

<?php if ($isAdmin): ?>
    <!-- Jika pengguna adalah admin, tampilkan tombol tambah -->
    <a href="admin.php" class="button">Tambah Data</a>
<?php endif; ?>

<table id="dataTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Rumah Sakit</th>
            <th>Nama Dokter</th>
            <th>Hari Kerja</th>
            <th>Jam Kerja</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Query data dari database
        $sql = "SELECT * FROM hospital_schedule";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $count . "</td>";
                echo "<td>" . $row['hospital_name'] . "</td>";
                echo "<td>" . $row['doctor_name'] . "</td>";
                echo "<td>" . $row['work_day'] . "</td>";
                echo "<td>" . $row['work_time'] . "</td>";
                echo "</tr>";
                $count++;
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }

        // Tutup koneksi ke database
        mysqli_close($conn);
        ?>
    </tbody>
</table>

</body>
</html>

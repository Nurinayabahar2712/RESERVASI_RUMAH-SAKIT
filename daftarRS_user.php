<?php
require 'koneksi.php';

// Mengambil semua data rumah sakit dari database
$sql = "SELECT * FROM dbrs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Rumah Sakit</title>
    <link rel="stylesheet" type="text/css" href="daftarRS_admin.css" />

</head>
<body>
    <div class="container">
        <h2>Daftar Rumah Sakit</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Gambar</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nama"] . "</td>
                        <td>" . $row["alamat"] . "</td>
                        <td>" . $row["noHP"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td><img src='" . $row["gambar"] . "' alt='Gambar Rumah Sakit'></td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada data rumah sakit.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>

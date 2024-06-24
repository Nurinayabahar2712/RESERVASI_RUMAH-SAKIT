<?php
include 'koneksi.php';

// Ambil daftar rumah sakit beserta poli dari database
$sql = "SELECT d.id AS rumah_sakit_id, d.nama AS rumah_sakit_name, d.alamat, d.noHP, d.email, d.gambar, p.name AS poli_name 
        FROM dbrs d 
        LEFT JOIN poli p ON d.id = p.dbrs_id";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="daftar_rs.css">
    <style>
        .button-container {
            margin-top: 20px; /* Tambahkan jarak vertikal di atas container button */
        }
        .add-button, .cancel-button {
            margin-right: 10px; /* Tambahkan jarak horizontal antar tombol */
            padding: 10px 20px; /* Sesuaikan padding tombol untuk tampilan yang lebih baik */
            background-color: #007bff; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            text-decoration: none; /* Hilangkan garis bawah pada link */
            border-radius: 5px; /* Tambahkan sedikit radius pada sudut tombol */
        }
        .cancel-button {
            background-color: #dc3545; /* Warna latar belakang tombol batal */
        }
    </style>
    <title>Daftar Poli Admin</title>
</head>
<body>
    <div class="container">
        <h2>Daftar Layanan Kesehatan di Parepare</h2>
        <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $current_rs_id = null;
                while($row = mysqli_fetch_assoc($result)) {
                    if ($current_rs_id !== $row['rumah_sakit_id']) {
                        if ($current_rs_id !== null) {
                            echo '</ul></div></div></div>';
                        }
                        $current_rs_id = $row['rumah_sakit_id'];
                        echo '<div class="col-lg-3 col-md-6 mb-4">';
                        echo '<div class="card h-100">';
                        echo '<img src="'.$row['gambar'].'" class="card-img-top" alt="'.$row['rumah_sakit_name'].'">';
                        echo '<div class="card-body">';
                        echo '<h4 class="card-title">'.$row['rumah_sakit_name'].'</h4>';
                        echo '<p class="card-text">'.$row['alamat'].'</p>';
                        echo '<p class="card-text">'.$row['noHP'].'</p>';
                        echo '<p class="card-text">'.$row['email'].'</p>';
                        echo '<h5>Poli:</h5>';
                        echo '<ul>';
                    }
                    echo '<li>'.$row['poli_name'].'</li>';
                }
                echo '</ul></div></div></div>';
            } else {
                echo "<div>Tidak ada layanan kesehatan tersedia</div>";
            }
            ?>
        </div>
        <div class="button-container">
            <a href="tambahPoli_admin.php" class="add-button">Tambah Poli</a>
            <a href="admin_dashboard.php" class="cancel-button">Batal</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Web Reservasi Rumah Sakit</p>
    </footer>
</body>
</html>

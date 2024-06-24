<?php
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="daftar_rs.css">
    <title>Web Reservasi Rumah Sakit</title>
</head>
<body>
    <div class="container">
        <h2>DAFTAR LAYANAN KESEHATAN DI PAREPARE</h2>
        <div class="row">
            <?php 
            $query = mysqli_query($conn, "SELECT * FROM dbrs");
            if (mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_assoc($query)) { ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama']; ?>">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $row['nama']; ?></h4>
                                <p class="card-text"><?php echo $row['alamat']; ?></p>
                                <p class="card-text"><?php echo $row['noHP']; ?></p>
                                <p class="card-text"><?php echo $row['email']; ?></p>
                                <p><button><a href="detail.php?id=<?php echo $row['id']; ?>">DETAIL</a></button></p>
                            </div>
                        </div>
                    </div>
                <?php 
                }
            } else {
                echo "<div>Tidak ada layanan kesehatan tersedia</div>";
            }
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Web Reservasi Rumah Sakit</p>
    </footer>
</body>
</html>

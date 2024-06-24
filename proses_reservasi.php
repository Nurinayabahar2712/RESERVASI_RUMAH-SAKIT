<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dbrs_id = $_POST['dbrs_id'];
    $poli_id = $_POST['poli_id'];
    $dokter_id = $_POST['dokter_id'];
    $tanggal_reservasi = $_POST['tanggal_reservasi'];

    // Ambil nomor antrian terakhir untuk dokter dan poli yang dipilih pada tanggal yang sama
    $antrian_sql = "SELECT MAX(no_antrian) AS no_antrian_terakhir 
                    FROM reservasi 
                    WHERE dbrs_id = '$dbrs_id' 
                    AND poli_id = '$poli_id' 
                    AND dokter_id = '$dokter_id'
                    AND tanggal_reservasi = '$tanggal_reservasi'";
    $antrian_result = mysqli_query($conn, $antrian_sql);
    $antrian_row = mysqli_fetch_assoc($antrian_result);
    $no_antrian_terakhir = $antrian_row['no_antrian_terakhir'];

    // Tambahkan nomor antrian baru
    $no_antrian_baru = $no_antrian_terakhir ? $no_antrian_terakhir + 1 : 1;

    // Simpan data reservasi
    $sql = "INSERT INTO reservasi (dbrs_id, poli_id, dokter_id, no_antrian, tanggal_reservasi) 
            VALUES ('$dbrs_id', '$poli_id', '$dokter_id', '$no_antrian_baru', '$tanggal_reservasi')";
    if (mysqli_query($conn, $sql)) {
        $message = "Reservasi berhasil! Nomor antrian Anda adalah $no_antrian_baru";
        header("Location: daftarDokter_admin.php");
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Reservasi</title>
</head>
<body>
    <div class="container">
        <h2><?php echo $message; ?></h2>
        <a href="reservasi.php">Kembali ke Reservasi</a>
    </div>
</body>
</html>

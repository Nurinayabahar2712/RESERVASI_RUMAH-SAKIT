<?php
include 'koneksi.php';

// Ambil daftar rumah sakit untuk dropdown
$dbrs_sql = "SELECT * FROM dbrs";
$dbrs_result = mysqli_query($conn, $dbrs_sql);

if (isset($_GET['dbrs_id'])) {
    $dbrs_id = $_GET['dbrs_id'];
    $sql = "SELECT * FROM poli WHERE dbrs_id = $dbrs_id";
    $result = mysqli_query($conn, $sql);

    $polis = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $polis[] = $row;
    }
    echo json_encode($polis);
    exit;
}

// Tangani permintaan AJAX untuk data dokter
if (isset($_GET['poli_id'])) {
    $poli_id = $_GET['poli_id'];
    $sql = "SELECT * FROM db_dokter WHERE poli_id = $poli_id";
    $result = mysqli_query($conn, $sql);

    $dokters = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $dokters[] = $row;
    }
    echo json_encode($dokters);
    exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <link rel="stylesheet" type="text/css" href="registrasi.css" />
    <script>
        function fetchPoli(dbrs_id) {
            fetch('reservasi.php?dbrs_id=' + dbrs_id)
                .then(response => response.json())
                .then(data => {
                    const poliSelect = document.getElementById('poli_id');
                    poliSelect.innerHTML = '';
                    data.forEach(poli => {
                        const option = document.createElement('option');
                        option.value = poli.id;
                        option.textContent = poli.nama;
                        poliSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching poli:', error));
        }

        function fetchDokter(poli_id) {
            fetch('reservasi.php?poli_id=' + poli_id)
                .then(response => response.json())
                .then(data => {
                    const dokterSelect = document.getElementById('dokter_id');
                    dokterSelect.innerHTML = '';
                    data.forEach(dokter => {
                        const option = document.createElement('option');
                        option.value = dokter.id;
                        option.textContent = dokter.nama;
                        dokterSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching dokter:', error));
        }

        document.addEventListener('DOMContentLoaded', function() {
            const dbrsSelect = document.getElementById('dbrs_id');
            const poliSelect = document.getElementById('poli_id');

            dbrsSelect.addEventListener('change', function() {
                fetchPoli(this.value);
            });

            poliSelect.addEventListener('change', function() {
                fetchDokter(this.value);
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <legend>Reservasi</legend>
        <form action="proses_reservasi.php" method="POST">
            <label for="dbrs_id">Nama Rumah Sakit:</label>
            <select id="dbrs_id" name="dbrs_id" required>
                <option value="" disabled selected>Pilih Rumah Sakit</option>
                <?php
                while ($row = mysqli_fetch_assoc($dbrs_result)) {
                    echo "<option value='".$row['id']."'>".$row['nama']."</option>";
                }
                ?>
            </select><br>

            <label for="poli_id">Nama Poli:</label>
            <select id="poli_id" name="poli_id" required>
                <option value="" disabled selected>Pilih Poli</option>
            </select><br>

            <label for="dokter_id">Nama Dokter:</label>
            <select id="dokter_id" name="dokter_id" required>
                <option value="" disabled selected>Pilih Dokter</option>
            </select><br>

            <label for="tanggal_reservasi">Tanggal Reservasi:</label>
            <input type="date" id="tanggal_reservasi" name="tanggal_reservasi" required><br>

            <button type="submit" name="submit">Reservasi</button>
        </form>
    </div>
</body>
</html>

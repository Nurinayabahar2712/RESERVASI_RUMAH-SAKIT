<?php
include 'koneksi.php';

// Ambil daftar rumah sakit untuk dropdown
$dbrs_sql = "SELECT * FROM dbrs";
$dbrs_result = mysqli_query($conn, $dbrs_sql);

// Tangani pengiriman form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $dbrs_id = $_POST['dbrs_id'];
    $poli_id = $_POST['poli_id'];
    $hari_pelayanan = implode(',', $_POST['hari_pelayanan']);
    $jam_pelayanan = $_POST['jam_pelayanan'];

    $sql = "INSERT INTO db_dokter (nama, alamat, telepon, email, dbrs_id, poli_id, hari_pelayanan, jam_pelayanan) VALUES ('$nama', '$alamat', '$telepon', '$email', '$dbrs_id', '$poli_id', '$hari_pelayanan', '$jam_pelayanan')";
    if (mysqli_query($conn, $sql)) {
        // Pengalihan ke halaman daftarDokter_admin.php setelah berhasil menambahkan data
        header("Location: daftarDokter_admin.php");
        exit();
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Tangani permintaan AJAX untuk data poli
if (isset($_GET['dbrs_id'])) {
    $dbrs_id = $_GET['dbrs_id'];
    $sql = "SELECT * FROM poli WHERE dbrs_id = $dbrs_id";
    $result = mysqli_query($conn, $sql);

    $polis = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $polis[] = $row;
    }
    echo json_encode($polis);
    exit; // Hentikan script setelah menangani permintaan AJAX
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokter</title>
    <link rel="stylesheet" type="text/css" href="registrasi.css" />
    <style>
        /* CSS untuk mengubah warna teks dropdown poli menjadi hitam */
        select {
            color: black;
        }
        /* CSS tambahan untuk merapikan checkbox */
        .checkbox-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .checkbox-container label {
            display: flex;
            align-items: center;
        }
        .checkbox-container input[type="checkbox"] {
            margin-right: 5px;
        }
    </style>
    <script>
        function validateForm() {
            const checkboxes = document.querySelectorAll('input[name="hari_pelayanan[]"]:checked');
            if (checkboxes.length < 3) {
                alert('Anda harus memilih minimal 3 hari.');
                return false; // Batalkan pengiriman form
            }
            return true; // Lanjutkan pengiriman form
        }

        function fetchPoli(dbrs_id) {
            fetch('?dbrs_id=' + dbrs_id)
                .then(response => response.json())
                .then(data => {
                    const poliSelect = document.getElementById('poli_id');
                    poliSelect.innerHTML = '<option value="" disabled selected>Pilih Poli</option>'; // Reset options
                    if (data.length > 0) {
                        data.forEach(poli => {
                            const option = document.createElement('option');
                            option.value = poli.id;
                            option.textContent = poli.nama;
                            poliSelect.appendChild(option);
                        });
                    } else {
                        const option = document.createElement('option');
                        option.textContent = 'Tidak ada poli yang tersedia';
                        poliSelect.appendChild(option);
                    }
                })
                .catch(error => console.error('Error fetching poli:', error));
        }

        document.addEventListener('DOMContentLoaded', function() {
            const dbrsSelect = document.getElementById('dbrs_id');
            dbrsSelect.addEventListener('change', function() {
                fetchPoli(this.value);
            });

            // Panggil fetchPoli saat halaman dimuat jika dbrs_id sudah dipilih sebelumnya
            if (dbrsSelect.value) {
                fetchPoli(dbrsSelect.value);
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <legend>Tambah Dokter</legend>
        <?php if (isset($message)) echo "<p>$message</p>"; ?>
        <form action="" method="POST" onsubmit="return validateForm()">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required><br>

            <label for="telepon">Telepon:</label>
            <input type="text" id="telepon" name="telepon" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

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
                <!-- Opsi poli akan dimuat secara dinamis berdasarkan rumah sakit yang dipilih -->
            </select><br>

            <label for="hari_pelayanan">Hari Pelayanan:</label>
            <div class="checkbox-container">
                <label><input type="checkbox" name="hari_pelayanan[]" value="Senin"> Senin</label>
                <label><input type="checkbox" name="hari_pelayanan[]" value="Selasa"> Selasa</label>
                <label><input type="checkbox" name="hari_pelayanan[]" value="Rabu"> Rabu</label>
                <label><input type="checkbox" name="hari_pelayanan[]" value="Kamis"> Kamis</label>
                <label><input type="checkbox" name="hari_pelayanan[]" value="Jumat"> Jumat</label>
                <label><input type="checkbox" name="hari_pelayanan[]" value="Sabtu"> Sabtu</label>
                <label><input type="checkbox" name="hari_pelayanan[]" value="Minggu"> Minggu</label>
            </div><br>

            <label for="jam_pelayanan">Jam Pelayanan:</label>
            <select id="jam_pelayanan" name="jam_pelayanan" required>
                <option value="" disabled selected>Pilih Jam</option>
                <option value="08:00-12:00">08:00-12:00</option>
                <option value="12:00-16:00">12:00-16:00</option>
                <option value="16:00-20:00">16:00-20:00</option>
            </select><br>

            <div class="button-container">
                <button type="submit" name="submit">Tambah</button>
                <button type="button" class="cancel-button" onclick="window.location.href='admin_dashboard.php'">Batal</button>
            </div>
        </form>
    </div>
</body>
</html>

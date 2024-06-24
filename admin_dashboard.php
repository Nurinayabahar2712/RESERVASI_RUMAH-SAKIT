<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["role"] != 'admin') {
    header("location: login.php");
    exit;
}

// Mencegah caching
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web RS</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <header>
            <div class="logo">
                <h2>Sistem Reservasi Cerdas Rumah Sakit</h2>
            </div>

            <div class="navigator">
                <ul class="nav-menu">
                    <li><a href="#Home">Home</a></li>
                    <li><a href="#Alur">Alur</a></li>
                    <li><a href="daftarRS_admin.php">Tambah Rumah Sakit</a></li>
                    <li><a href="admin_poli.php">Tambah Poli</a></li>
                    <li><a href="daftarDokter_admin.php">Dokter</a></li>
                    <li><a href="reservasi.html">Reservasi</a></li>
                    <li><a href="profile.php"><i class='bx bxs-user profile-icon'></i></a></li>

            </div>
        </header>
        <div class="hero">
            <h2>Selamat Datang di</h2>
            <h1>Sistem Reservasi Rumah Sakit</h1>
            <h3>We Care, We're Here For You</h3>
            <a href="#">Daftar Online</a>
        </div>
        
        <div class="wrapper">
            <img src="Rumah_Sakit.jpg">
            <div class="kolom">
                <h2>ABOUT</h2>
                <p>Sistem Reservasi Cerdas Rumah Sakit adalah solusi digital 
                    inovatif yang dirancang untuk memberikan kemudahan dan kenyamanan dalam 
                    mengakses layanan kesehatan. Dengan sistem kami, Anda dapat melakukan 
                    reservasi jadwal dokter, memeriksa ketersediaan kamar, dan mengelola 
                    janji temu dengan cepat dan efisien. Dukung kesehatan Anda dengan 
                    teknologi terkini yang menawarkan pengalaman reservasi yang seamless, 
                    aman, dan terintegrasi. Manfaatkan waktu Anda sebaik mungkin dan nikmati 
                    pelayanan medis terbaik dengan hanya beberapa klik dari kenyamanan rumah Anda.</p>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="footer-content">
                    <h3>Contact Us</h3>
                    <p>Email : kelompok3@gmail.com</p>
                    <p>Phone : 081234456890</p>
                    <p>Address : Kampus 2 ITH</p>
                </div>
                <div class="footer-content">
                    <h3>Links</h3>
                     <ul class="list">
                        <li><a href="">Home</a></li>
                        <li><a href="">Alur</a></li>
                        <li><a href="">Layanan Kesehatan</a></li>
                        <li><a href="">Daftar Poli</a></li>
                        <li><a href="">Reservasi</a></li>
                     </ul>
                </div>
                <div class="footer-content">
                    <h3>Follow Us</h3>
                     <li><a href=""><i class="fab fa-instagram"></i></a></li>
                     <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
                     <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; Sistem Reservasi Cerdas Rumah Sakit .All right reserved</p>
            </div>
        </footer>

        <script src="script.js"></script>

    </body>
</html>

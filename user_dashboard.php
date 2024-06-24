<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["role"] != 'user') {
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
                <li><a href="daftar_RS.php">Daftar Rumah Sakit</a></li>
                <li><a href="poli_user.php">Daftar Poli</a></li>
                <li><a href="daftarDokter_user.php">Dokter</a></li>
                <li><a href="reservasi.html">Reservasi</a></li>
                <li><a href="profile.php"><i class='bx bxs-user profile-icon'></i></a></li>
                
            </ul>
        </div>
    </header>
    <div class="hero">
        <h1>Sistem Reservasi Rumah Sakit</h1>
        <h3>We Care, We're Here For You</h3>
        <a href="#">Daftar Online</a>
    </div>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid perferendis dolor aut qui corporis, ipsum repellat dignissimos atque corrupti esse accusantium labore doloribus iusto sapiente praesentium? Voluptatem impedit est vero perspiciatis! Illo eaque, vel eos tempora laborum at. Doloremque in rerum quo, magni atque quae illo ex assumenda, totam iure libero, nobis unde exercitationem? Amet placeat officiis illo exercitationem eum minima minus aspernatur eveniet perspiciatis rerum mollitia laborum, odit earum totam aut beatae, non commodi ipsa officia repudiandae ut debitis, corporis facere dolorum? Reprehenderit, molestias. Magnam est ratione, ab nostrum illum animi necessitatibus consectetur in dolores? Debitis unde excepturi voluptatum.
        </p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque culpa iste nihil accusantium mollitia quos qui veritatis dicta veniam delectus ipsa natus facilis beatae nisi at expedita iusto nostrum ipsam distinctio asperiores quaerat illo, sequi harum! Earum, pariatur possimus perspiciatis modi impedit quod iste. Quos tempore blanditiis ipsa eligendi corporis dignissimos dolor placeat perspiciatis enim. Tempora odit culpa possimus id autem commodi qui quas assumenda optio. Deleniti quo eos sit quaerat, esse facere ipsam atque officia at explicabo aperiam minima eveniet reprehenderit ad cum dignissimos accusantium soluta similique veniam necessitatibus quasi alias quibusdam. Asperiores vero voluptatum doloribus quod iste sapiente!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia odit ex corrupti porro, nobis eius, maxime ipsum laboriosam dolor odio voluptas ipsa et aspernatur repellendus error omnis quaerat rerum cumque amet tenetur! Illo excepturi vero deleniti laudantium harum saepe vitae ipsam aperiam consequuntur assumenda! Molestias odit fugiat earum nobis soluta accusamus voluptate expedita minima maiores debitis error reiciendis officia voluptatum sequi voluptatibus sapiente tempore quidem, necessitatibus id quisquam incidunt hic? Explicabo recusandae mollitia quae obcaecati quod fuga quasi atque hic adipisci alias doloribus voluptate et ducimus quia eaque, unde consequuntur! Error sequi et iusto quibusdam illum atque ipsa ex cupiditate.</p>
    </div>

    <script src="script.js"></script>
</body>
</html>

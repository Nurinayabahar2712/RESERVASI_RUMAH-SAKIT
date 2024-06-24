<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = mysqli_connect("localhost", "root", "", "reservasi")
// $servername="localhost";
// $database="datadiri";
// $username="root";
// $password="";

// $conn = mysqli_connect($servername, $database, $username, $password );

// if (!$conn){
//     die("Koneksi Gagal : ". mysqli_connect_error());
// }else{
//     echo "Koneksi Berhasil";
// }
?>
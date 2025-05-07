<?php
$host = "localhost";
$user = "root";       // default MySQL user di XAMPP
$pass = "";           // default password kosong
$db   = "cms_sederhana";

$conn = new mysqli($host, $user, $pass, $db);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

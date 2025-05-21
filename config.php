<?php
// Konfigurasi koneksi database
$host = "localhost"; // host database
$username = "portfolio_user"; // username database
$password = "password123"; // password yang telah Anda atur
$database = "portfolio_contact"; // nama database

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

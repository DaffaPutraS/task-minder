<?php
// Informasi koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "tugasakhir_php";

// Membuat objek koneksi baru menggunakan mysqli
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil
if ($koneksi->connect_error) {
    // Jika koneksi gagal, tampilkan pesan error dan hentikan eksekusi skrip
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>

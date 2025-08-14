<?php
// ==== Konfigurasi Database ====
// Atur port sesuai XAMPP (3306) atau Laragon (3307)
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'puskesmas_db';
$DB_PORT = 3306; // ganti ke 3307 jika pakai Laragon

// Buat koneksi
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

// Cek koneksi
if ($conn->connect_errno) {
    die('❌ Koneksi gagal: ' . $conn->connect_error);
}

// Pastikan encoding UTF-8 supaya karakter Indonesia aman
$conn->set_charset("utf8mb4");
?>

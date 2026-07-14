<?php
// Komentar: Pengaturan konfigurasi koneksi ke basis data MySQL
$host     = "localhost";
$username = "root";
$password = "";
$database = "DB_REMIDI_PBO_TI1C_IfatFebriansyah"; // Sesuaikan dengan nama DB Anda

try {
    // Komentar: Inisialisasi properti DSN dan instance PDO
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    
    // Komentar: Mengatur mode error PDO ke Exception untuk mempermudah debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Komentar: Menampilkan pesan kesalahan jika koneksi gagal
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>
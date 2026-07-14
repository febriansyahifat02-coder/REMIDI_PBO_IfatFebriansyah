<?php
// Memanggil class yang sudah dibuat sebelumnya
require_once 'ReservasiReguler.php';
require_once 'ReservasiPremium.php';
require_once 'ReservasiEvent.php';

// Konfigurasi Database (Sesuaikan username dan password jika perlu)
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "DB_REMIDI_PBO_TI1C_IfatFebriansyah";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Reservasi Studio Foto</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; color: #333; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 40px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #007BFF; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        h1 { text-align: center; }
        h2 { border-bottom: 2px solid #007BFF; padding-bottom: 5px; display: inline-block; }
    </style>
</head>
<body>

    <h1>Daftar Transaksi Reservasi Studio Foto</h1>

    <h2>Kategori: Reservasi Reguler</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Durasi</th>
            <th>Spesifikasi Paket</th>
            <th>Total Biaya</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tabel_reservasi WHERE jenis_paket = 'reguler'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Instansiasi objek ReservasiReguler
                $reguler = new ReservasiReguler($row['id_reservasi'], $row['nama_pelanggan'], $row['tanggal_booking'], $row['durasi_jam'], $row['tarif_dasar_per_jam'], $row['tipe_background'], $row['cetak_foto_lembar']);
                
                echo "<tr>";
                echo "<td>{$row['id_reservasi']}</td>";
                echo "<td>{$row['nama_pelanggan']}</td>";
                echo "<td>{$row['tanggal_booking']}</td>";
                echo "<td>{$row['durasi_jam']} Jam</td>";
                // Memanggil method dari OOP
                echo "<td>" . $reguler->tampilkanSpesifkasiPaket() . "</td>";
                echo "<td><strong>Rp " . number_format($reguler->hitungTotalBiaya(), 0, ',', '.') . "</strong></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data reservasi reguler.</td></tr>";
        }
        ?>
    </table>

    <h2>Kategori: Reservasi Premium</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Durasi</th>
            <th>Spesifikasi Paket</th>
            <th>Total Biaya</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tabel_reservasi WHERE jenis_paket = 'premium'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Instansiasi objek ReservasiPremium
                $premium = new ReservasiPremium($row['id_reservasi'], $row['nama_pelanggan'], $row['tanggal_booking'], $row['durasi_jam'], $row['tarif_dasar_per_jam'], $row['kuota_talent_orang'], $row['layanan_makeup']);
                
                echo "<tr>";
                echo "<td>{$row['id_reservasi']}</td>";
                echo "<td>{$row['nama_pelanggan']}</td>";
                echo "<td>{$row['tanggal_booking']}</td>";
                echo "<td>{$row['durasi_jam']} Jam</td>";
                // Memanggil method dari OOP
                echo "<td>" . $premium->tampilkanSpesifkasiPaket() . "</td>";
                echo "<td><strong>Rp " . number_format($premium->hitungTotalBiaya(), 0, ',', '.') . "</strong></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data reservasi premium.</td></tr>";
        }
        ?>
    </table>

    <h2>Kategori: Reservasi Event</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Durasi</th>
            <th>Spesifikasi Paket</th>
            <th>Total Biaya</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tabel_reservasi WHERE jenis_paket = 'event'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Instansiasi objek ReservasiEvent
                $event = new ReservasiEvent($row['id_reservasi'], $row['nama_pelanggan'], $row['tanggal_booking'], $row['durasi_jam'], $row['tarif_dasar_per_jam'], $row['nama_lokasi_luar'], $row['biaya_transportasi_tim']);
                
                echo "<tr>";
                echo "<td>{$row['id_reservasi']}</td>";
                echo "<td>{$row['nama_pelanggan']}</td>";
                echo "<td>{$row['tanggal_booking']}</td>";
                echo "<td>{$row['durasi_jam']} Jam</td>";
                // Memanggil method dari OOP
                echo "<td>" . $event->tampilkanSpesifkasiPaket() . "</td>";
                echo "<td><strong>Rp " . number_format($event->hitungTotalBiaya(), 0, ',', '.') . "</strong></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data reservasi event.</td></tr>";
        }
        ?>
    </table>

</body>
</html>
<?php
require_once 'Reservasi.php';

class ReservasiReguler extends Reservasi {
    // Atribut spesifik (anak)
    protected $tipeBackground;
    protected $cetakFotoLembar;

    // Konstruktor untuk inisialisasi atribut parent dan anak
    public function __construct($idReservasi, $namaPelanggan, $tanggalBooking, $durasiJam, $tarifDasarPerJam, $tipeBackground, $cetakFotoLembar) {
        parent::__construct($idReservasi, $namaPelanggan, $tanggalBooking, $durasiJam, $tarifDasarPerJam);
        $this->tipeBackground = $tipeBackground;
        $this->cetakFotoLembar = $cetakFotoLembar;
    }

    // [Tahap 5] Implementasi Overriding Polimorfisme
    public function hitungTotalBiaya() {
        $totalDurasi = $this->durasiJam * $this->tarifDasarPerJam;
        $biayaTambahanFlat = 50000; // Biaya sewa kamera/kebersihan flat
        
        return $totalDurasi + $biayaTambahanFlat;
    }

    // [Tahap 3 & 4] Menampilkan spesifikasi paket
    public function tampilkanSpesifkasiPaket() {
        return "Paket Reguler [Background: {$this->tipeBackground}, Cetak Foto: {$this->cetakFotoLembar} Lembar]";
    }

    // [Tahap 4] Metode berisi query SELECT-WHERE
    public static function dapatkanRegulerBerdasarkanId($conn, $id) {
        $sql = "SELECT id_reservasi, nama_pelanggan, tanggal_booking, durasi_jam, tarif_dasar_per_jam, tipe_background, cetak_foto_lembar 
                FROM tabel_reservasi 
                WHERE id_reservasi = ? AND jenis_paket = 'reguler'";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return new self(
                $row['id_reservasi'],
                $row['nama_pelanggan'],
                $row['tanggal_booking'],
                $row['durasi_jam'],
                $row['tarif_dasar_per_jam'],
                $row['tipe_background'],
                $row['cetak_foto_lembar']
            );
        }
        return null;
    }
}
?>
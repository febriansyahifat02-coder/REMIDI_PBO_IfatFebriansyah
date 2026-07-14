<?php
require_once 'Reservasi.php';

class ReservasiPremium extends Reservasi {
    // Atribut spesifik (anak)
    protected $kuotaTalentOrang;
    protected $layananMakeup;

    // Konstruktor untuk inisialisasi atribut parent dan anak
    public function __construct($idReservasi, $namaPelanggan, $tanggalBooking, $durasiJam, $tarifDasarPerJam, $kuotaTalentOrang, $layananMakeup) {
        parent::__construct($idReservasi, $namaPelanggan, $tanggalBooking, $durasiJam, $tarifDasarPerJam);
        $this->kuotaTalentOrang = $kuotaTalentOrang;
        $this->layananMakeup = $layananMakeup;
    }

    // [Tahap 5] Implementasi Overriding Polimorfisme
    public function hitungTotalBiaya() {
        $totalDurasi = $this->durasiJam * $this->tarifDasarPerJam;
        
        // Surcharge layanan 20% (dikali 1.20)
        return $totalDurasi * 1.20;
    }

    // [Tahap 3 & 4] Menampilkan spesifikasi paket
    public function tampilkanSpesifkasiPaket() {
        $statusMakeup = $this->layananMakeup ? "Termasuk" : "Tidak Termasuk";
        return "Paket Premium [Kuota Talent: {$this->kuotaTalentOrang} Orang, Layanan Makeup: {$statusMakeup}]";
    }

    // [Tahap 4] Metode berisi query SELECT-WHERE
    public static function dapatkanPremiumBerdasarkanId($conn, $id) {
        $sql = "SELECT id_reservasi, nama_pelanggan, tanggal_booking, durasi_jam, tarif_dasar_per_jam, kuota_talent_orang, layanan_makeup 
                FROM tabel_reservasi 
                WHERE id_reservasi = ? AND jenis_paket = 'premium'";
        
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
                $row['kuota_talent_orang'],
                (bool)$row['layanan_makeup']
            );
        }
        return null;
    }
}
?>
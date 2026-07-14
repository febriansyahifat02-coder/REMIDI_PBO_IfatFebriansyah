<?php
require_once 'Reservasi.php';

class ReservasiEvent extends Reservasi {
    // Atribut spesifik (anak)
    protected $namaLokasiLuar;
    protected $biayaTransportasiTim;

    // Konstruktor untuk inisialisasi atribut parent dan anak
    public function __construct($idReservasi, $namaPelanggan, $tanggalBooking, $durasiJam, $tarifDasarPerJam, $namaLokasiLuar, $biayaTransportasiTim) {
        parent::__construct($idReservasi, $namaPelanggan, $tanggalBooking, $durasiJam, $tarifDasarPerJam);
        $this->namaLokasiLuar = $namaLokasiLuar;
        $this->biayaTransportasiTim = $biayaTransportasiTim;
    }

    // [Tahap 5] Implementasi Overriding Polimorfisme
    public function hitungTotalBiaya() {
        $totalDurasi = $this->durasiJam * $this->tarifDasarPerJam;
        
        // Ditambah biaya transportasi tim
        return $totalDurasi + $this->biayaTransportasiTim;
    }

    // [Tahap 3 & 4] Menampilkan spesifikasi paket
    public function tampilkanSpesifkasiPaket() {
        return "Paket Event [Lokasi: {$this->namaLokasiLuar}, Transportasi: Rp" . number_format($this->biayaTransportasiTim, 0, ',', '.') . "]";
    }

    // [Tahap 4] Metode berisi query SELECT-WHERE
    public static function dapatkanEventBerdasarkanId($conn, $id) {
        $sql = "SELECT id_reservasi, nama_pelanggan, tanggal_booking, durasi_jam, tarif_dasar_per_jam, nama_lokasi_luar, biaya_transportasi_tim 
                FROM tabel_reservasi 
                WHERE id_reservasi = ? AND jenis_paket = 'event'";
        
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
                $row['nama_lokasi_luar'],
                $row['biaya_transportasi_tim']
            );
        }
        return null;
    }
}
?>
<?php

abstract class Reservasi {
    // 1. Properti terenkapsulasi (protected) menggunakan format camelCase
    // Sesuai dengan kolom tabel: id_reservasi, nama_pelanggan, tanggal_booking, durasi_jam, tarif_dasar_per_jam
    protected $idReservasi;
    protected $namaPelanggan;
    protected $tanggalBooking;
    protected $durasiJam;
    protected $tarifDasarPerJam;

    // Konstruktor untuk menginisialisasi nilai properti saat objek dibuat nantinya
    public function __construct($idReservasi, $namaPelanggan, $tanggalBooking, $durasiJam, $tarifDasarPerJam) {
        $this->idReservasi = $idReservasi;
        $this->namaPelanggan = $namaPelanggan;
        $this->tanggalBooking = $tanggalBooking;
        $this->durasiJam = $durasiJam;
        $this->tarifDasarPerJam = $tarifDasarPerJam;
    }

    // 2. Metode abstrak (tanpa isi/body)
    // Kelas turunan (anak) wajib mengimplementasikan ulang metode ini
    abstract public function hitungTotalBiaya();
    
    abstract public function tampilkanSpesifkasiPaket();
}

?>
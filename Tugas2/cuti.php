<?php
// Mengimpor file 'database.php' yang berisi class 'Database' untuk mengatur koneksi ke database
require 'database.php';

// Membuat class 'Cuti' yang merupakan turunan (extends) dari class 'Database'
class Cuti extends Database {

    // Konstruktor class 'Cuti', memanggil konstruktor dari class induk 'Database' untuk koneksi ke database
    public function __construct() {
        // Memanggil konstruktor dari class 'Database' menggunakan parent::__construct()
        parent::__construct();
    }

    // Method 'tampilData' untuk mengambil data dari tabel 'tbl_izin'
    public function tampilData() {
        // SQL query untuk memilih data dari 'tbl_izin' di mana 'keperluan' adalah 'Cuti' dan 'nama_pengusul' adalah 'Amanda'
        $sql = "SELECT * FROM tbl_izin WHERE keperluan = 'Cuti' and nama_pengusul = 'Amanda'";

        // Menjalankan query SQL dan mengembalikan hasilnya
        return $this->connect->query($sql);
    }
}

?>

<?php
// Mengimpor file 'database.php' yang berisi class 'Database' untuk melakukan koneksi ke database
require 'database.php';

// Membuat class 'Alfa' yang merupakan turunan (extends) dari class 'Database'
class Alfa extends Database {

    // Konstruktor class 'Alfa', memanggil konstruktor class induk 'Database' untuk koneksi ke database
    public function __construct() {
        // Memanggil konstruktor dari class 'Database' menggunakan parent::__construct()
        parent::__construct();
    }

    // Method 'tampilData' untuk mengambil data dari tabel 'tbl_izin'
    public function tampilData() {
        // SQL query untuk memilih data dari 'tbl_izin' di mana 'keperluan' adalah 'Alfa' dan 'nama_pengusul' adalah 'Amanda'
        $sql = "SELECT * FROM tbl_izin WHERE keperluan = 'Alfa' and nama_pengusul = 'Amanda'";

        // Menjalankan query SQL dan mengembalikan hasilnya
        return $this->connect->query($sql);
    }
}

?>

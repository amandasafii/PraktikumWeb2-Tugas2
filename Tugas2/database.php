<?php
class Database {

    // Deklarasi properti untuk informasi koneksi database
    private $host = "localhost"; // Nama host, default adalah localhost
    private $user = "root";      // Nama pengguna database
    private $pass = "";          // Password untuk pengguna database
    private $db = "izin_pegawai"; // Nama database yang akan digunakan
    protected $connect;          // Properti untuk menyimpan objek koneksi ke database

    // Konstruktor, dijalankan saat objek Database dibuat
    public function __construct() {
        
        // Membuat koneksi ke database menggunakan mysqli
        $this->connect = new mysqli($this->host, $this->user, $this->pass, $this->db);
        
        // Mengecek apakah terjadi error saat koneksi
        if ($this->connect->connect_error) {
            die("Koneksi database gagal: " . $this->connect->connect_error); // Menampilkan pesan error jika koneksi gagal
        } 
    }

    // Fungsi untuk mengambil data dari tabel 'tbl_izin'
    public function tampilData() {
        // Query SQL untuk memilih semua data dari tabel 'tbl_izin'
        $data = "SELECT * FROM tbl_izin";

        // Melakukan query ke database dan menyimpan hasilnya
        $hasil = $this->connect->query($data);

        // Deklarasi array untuk menampung hasil
        $result = []; 

        // Mengecek apakah ada data yang ditemukan
        if ($hasil->num_rows > 0) {
            // Mengambil data satu per satu menggunakan fetch_assoc() dan menyimpannya dalam array $result
            while ($d = $hasil->fetch_assoc()) {
                $result[] = $d; // Menambahkan data ke dalam array
            }
        }

        // Mengembalikan array yang berisi data
        return $result;
    }
}

// Membuat instance dari kelas Database agar koneksi ke database dapat dilakukan
$db = new Database();

?>

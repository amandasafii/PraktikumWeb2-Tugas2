# PraktikumWeb2-Tugas2 <br>
# Membuat View berbasis OOP dengan mengambil data dari database MySQL<br><br>
## Studi Kasus :<br>
## "Izin Ketidakhadiran Pegawai"<br><br>
**Nama : Amanda Dwi Safitri**<br>
**NPM : 230102050**<br>
**Kelas : TI-2C**<br><br>
### Langkah 1<br>
<i>**Membuat View berbasis OOP, dengan mengambil data dari database MySQL :**</i><br>
- Membuat database 'izin_pegawai' dan mengisikan database dengan tabel 'tbl_izin' : <br><br>
![image](https://github.com/user-attachments/assets/c3964e5c-4683-4883-9c9e-265fe5653f61)<br><br>

- Membuat view dengan menggunakan Bootstrap :<br>
Pada pembuatan View kali ini menggunakan Bootsrap, dengan cara copy-link bootstrap lalu ditempelkan pada bagian head pada HTML. Fungsi utama menggunakan Bootstrap sendiri supaya lebih cepat dan efisien sebab telah diberikan template untuk membuat tampilan dari web yang kita buat.

```php
<?php
<!DOCTYPE html>
<html lang="en">
<head>
<!--Gaya CSS untuk mengatur tampilan tabel--> 
<style>
  table, th, td {
    border: 1px solid black; /* Memberikan border hitam pada tabel, header, dan sel */
  }
  .container-fluid {
    max-width: 100%; /* Mengatur agar lebar maksimal container 100% layar */
    overflow-x: auto; /* Menambahkan kemampuan scroll secara horizontal jika konten melebihi layar */
  }
</style>

  <title>Tugas 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Menghubungkan dengan CDN Bootstrap untuk styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Bagian Navigasi -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <!-- Tautan ke halaman Owner -->
          <a class="nav-link" href="beranda.php">Owner</a>
        </li>  
        <li class="nav-item dropdown">
          <!-- Dropdown untuk menu Pegawai -->
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Pegawai</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="tampil_sakit.php">Sakit</a></li>
            <li><a class="dropdown-item" href="tampil_cuti.php">Cuti</a></li>
            <li><a class="dropdown-item" href="tampil_alfa.php">Alfa</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Bagian Header halaman -->
<div class="container-fluid mt-3">
  <h3>Selamat Datang di Liberian Office</h3>
  <p>Cek data kehadiranmu disini!</p>
</div>
?>
```

- Mengambil data dari database MySQL : <br>
Langkah - langkah :
1. Buat class 'class database'<br>
2. Deklarasikan properti untuk informasi koneksi database yang terdiri atas $host, $user, $pass, $db.<br>
3. Menggunakan fungsi __constructor untuk menampung nilai yang ada di database, lalu gunakan 'new mysqli' untuk membuat koneksi ke database.<br>
4. Gunakan fungsi if untuk melakukan pengecekkan apakah sudah terkoneksi atau belum. <br>
5. Gunakan fungsi/metode tampilData() untuk mengambil data dari tabel 'tbl_izin' dalam database izin_pegawai.<br><br>

Berikut merupakan code lengkap untuk mengambil data pada MySQL :<br>

```php
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

?>
```

  Code lengkap cara mengambil data :<br>
  
```php
<?php
 <!-- Kode PHP untuk mengambil dan menampilkan data dari database -->
      <?php
      include('database.php'); // Menghubungkan file database
      $db = new Database(); // Membuat instance dari class Database
      $data = $db->tampilData(); // Memanggil fungsi tampilData() untuk mengambil data dari tabel izin

      // Mengecek apakah data tidak kosong
      if (!empty($data)){
      $no = 1; // Deklarasi variabel $no sebagai nomor urut
      foreach ($data as $row) { // Melakukan looping data
      ?>
?>
```

### Langkah 2<br>
<i>**Menggunakan _construct sebagai link ke database**</i><br>

```php
<?php
// Konstruktor, dijalankan saat objek Database dibuat
    public function __construct() {
        
        // Membuat koneksi ke database menggunakan mysqli
        $this->connect = new mysqli($this->host, $this->user, $this->pass, $this->db);
        
        // Mengecek apakah terjadi error saat koneksi
        if ($this->connect->connect_error) {
            die("Koneksi database gagal: " . $this->connect->connect_error); // Menampilkan pesan error jika koneksi gagal
        } 
    }

?>
```

### Langkah 3<br>
<i>**Menerapkan enkapsulasi sesuai logika studi kasus**</i><br>
Pada dasarnya, Enkapsulasi adalah penyembunyian detail internal dari suatu objek dan mengontrol akses ke data atau metode yang dimilikinya. Dengan enkapsulasi, data dan fungsionalitas objek dilindungi sehingga hanya bagian tertentu yang bisa diakses dan dimanipulasi oleh bagian lain dari program.<br>

**a. Akses Modifier Private**<br>
Pada studi kasus kali ini, objek yang di enkapsulasi pertama yaitu objek $host, $user, $pass, dan $db pada class Database menjadi private. Supaya hanya dapat diakses dari dalam kelas itu sendiri, tidak bisa diakses dari luar, yaitu class Database. Sebab $host, $user, $pass, dan $db mempunyai akses penting terkakit nama host dari server, nama pengguna, password, dan nama basis data yang ingin diakses <br><br>

Code akses modifier private : <br>

```php
<?php
private $host = "localhost"; // Nama host, default adalah localhost
    private $user = "root";      // Nama pengguna database
    private $pass = "";          // Password untuk pengguna database
    private $db = "izin_pegawai"; // Nama database yang akan digunakan
?>
```

**b. Akses Modifier Protected**<br>
Pada studi kasus kali ini, objek yang di enkapsulasi kedua yaitu objek $connect pada class Database menjadi protected. Supaya dapat diakses oleh kelas turunan (subclass) dan dari kelas yang ada dalam package yang sama, yaitu class Sakit, class izin, dan class Alfa pada Database. Sebab $connect menjaga supaya database hanya bisa diakses oleh turunan dari kelas class Database saja. <br><br>

Code akses modifier protected : <br>

```php
<?php
 protected $connect;          
?>
```

**c. Akses Modifier Public**<br>
Pada studi kasus kali ini, objek yang di enkapsulasi terakhir yaitu metode tampilData() pada class Database menjadi public. Supaya dapat diakses dari mana saja, termasuk dari luar kelas Database.<br><br>

Code akses modifier public : <br>

```php
<?php
   public function tampilData()
?>
```

### Langkah 4<br>
<i>**Membuat kelas turunan menggunakan konsep pewarisan**</i><br>
Class turunan dari Class Database terbagi menjadi 3 pada studi kasus kali ini, yaitu : <br><br>
**a. Class Sakit**
Class Sakit mewarisi metode dan connection dari Class Parent-nya yaitu Class Database. Untuk melakukan pewarisan terseut menggunakan fungsi **'class Sakit extends Database'**.<br>
Code Inheritance Class Sakit extends Class Database : <br><br>

```php
<?php
// Mengimpor file 'database.php' yang berisi class 'Database' untuk mengatur koneksi ke database
require 'database.php';

// Membuat class 'Sakit' yang merupakan turunan (extends) dari class 'Database'
class Sakit extends Database {

    // Konstruktor class 'Sakit', memanggil konstruktor dari class induk 'Database' untuk koneksi ke database
    public function __construct() {
        // Memanggil konstruktor dari class 'Database' menggunakan parent::__construct()
        parent::__construct();
    }

    // Method 'tampilData' untuk mengambil data dari tabel 'tbl_izin'
    public function tampilData() {
        // SQL query untuk memilih data dari 'tbl_izin' di mana 'keperluan' adalah 'Sakit' dan 'nama_pengusul' adalah 'Amanda'
        $sql = "SELECT * FROM tbl_izin WHERE keperluan = 'Sakit' and nama_pengusul = 'Amanda'";

        // Menjalankan query SQL dan mengembalikan hasilnya
        return $this->connect->query($sql);
    }
}

// Membuat objek 'sakit1' dari class 'Sakit'
$sakit1 = new Sakit();

// Memanggil method 'tampilData' untuk mengambil data dan menyimpannya dalam variabel '$data1'
$data1 = $sakit1->tampilData();
?>
```

**b. Class Cuti**
Class Cuti mewarisi metode dan connection dari Class Parent-nya yaitu Class Database. Untuk melakukan pewarisan terseut menggunakan fungsi **'class Cuti extends Database'**.<br>
Code Inheritance Class Cuti extends Class Database : <br><br>

```php
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
```

**c. Class Alfa**
Class Alfa mewarisi metode dan connection dari Class Parent-nya yaitu Class Database. Untuk melakukan pewarisan terseut menggunakan fungsi **'class Alfa extends Database'**.<br>
Code Inheritance Class Alfa extends Class Database : <br><br>

```php
<?php
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
```

### Langkah 5<br>
<i>**Menerapkan polimorfisme untuk minimal 2 role sesuai studi kasus**</i><br>
Pada studi kasus kali ini menggunakan 2 role, yaitu :<br>
**a. Role Owner**<br>
Pada Owner, dapat melihat semua data daripada izin pegawai (sakit, cuti dan alfa), semua data akan ditampilkan dengan menerapkan konsep Polimorphysm berikut : <br>

Langkah - langkah menampilkan seluruh pada Role Owner dari database MySQL :<br>
a. include('database.php') : digunakan untuk menghubungkan file database<br>
b. $db = new Database(); : digunakan untuk membuat instance dari class Database<br>
c. $data = $db->tampilData(); : digunakan untuk memanggil fungsi tampilData() untuk mengambil data dari tabel izin<br>

  Setelah itu, jangan lupa untuk mengecek apakah data tidak kosong, dengan cara :<br>

1. Mendeklarasi variabel $no sebagai nomor urut :<br>

```php
   <?php
if (!empty($data)){
      $no = 1;
   ?>
```

2. Melakukan looping data :<br>
```php
foreach ($data as $row)
   ?>
```

**b. Role Pegawai**<br>
Pada Role Pegawai, dibuat supaya Pegawai hanya bisa melihat data izin kehadirannya saja, namun tidak bisa melihat milik orang lain atau seluruh data seperti pada Role Owner. Pada Role Pegawai kali ini, berperan sebagai 'Amanda', maka 'Amanda' hanya bisa melihat data izin kehadirannya saja, namun milik orang lain/ semua data tidak bisa diakses oleh 'Amanda'.<br>

**- Role Pegawai 'Amanda' Sakit.** <br>
Class Polimorphysm pada role ini sama seperti pada Role Owner, tetapi pada Role ini menggunakan filter :<br>
""SELECT * FROM tbl_izin WHERE keperluan = 'Sakit' and nama_pengusul = 'Amanda'""<br>
supaya hanya data milik 'Amanda' saja yang tampil.<br>

Code role pegawai sakit : <br>
```php
<?php
    // Method 'tampilData' untuk mengambil data dari tabel 'tbl_izin'
    public function tampilData() {
        // SQL query untuk memilih data dari 'tbl_izin' di mana 'keperluan' adalah 'Sakit' dan 'nama_pengusul' adalah 'Amanda'
        $sql = "SELECT * FROM tbl_izin WHERE keperluan = 'Sakit' and nama_pengusul = 'Amanda'";

        // Menjalankan query SQL dan mengembalikan hasilnya
        return $this->connect->query($sql);
    }
}

// Membuat objek 'sakit1' dari class 'Sakit'
$sakit1 = new Sakit();

// Memanggil method 'tampilData' untuk mengambil data dan menyimpannya dalam variabel '$data1'
$data1 = $sakit1->tampilData();
?>
```

**- Role Pegawai 'Amanda' Cuti.** <br>
Class Polimorphysm pada role ini sama seperti pada Role Owner, tetapi pada Role ini menggunakan filter :<br>
""SELECT * FROM tbl_izin WHERE keperluan = 'Cuti' and nama_pengusul = 'Amanda'""<br>
supaya hanya data milik 'Amanda' saja yang tampil.<br>

Code role pegawai cuti : <br>
```php
<?php
    // Method 'tampilData' untuk mengambil data dari tabel 'tbl_izin'
    public function tampilData() {
        // SQL query untuk memilih data dari 'tbl_izin' di mana 'keperluan' adalah 'Cuti' dan 'nama_pengusul' adalah 'Amanda'
        $sql = "SELECT * FROM tbl_izin WHERE keperluan = 'Cuti' and nama_pengusul = 'Amanda'";

        // Menjalankan query SQL dan mengembalikan hasilnya
        return $this->connect->query($sql);
    }
}
?>
```

**- Role Pegawai 'Amanda' Alfa.** <br>
Class Polimorphysm pada role ini sama seperti pada Role Owner, tetapi pada Role ini menggunakan filter :<br>
""SELECT * FROM tbl_izin WHERE keperluan = 'Alfa' and nama_pengusul = 'Amanda'""<br>
supaya hanya data milik 'Amanda' saja yang tampil.<br>

Code role pegawai Alfa : <br>
```php
<?php
    // Method 'tampilData' untuk mengambil data dari tabel 'tbl_izin'
    public function tampilData() {
        // SQL query untuk memilih data dari 'tbl_izin' di mana 'keperluan' adalah 'Alfa' dan 'nama_pengusul' adalah 'Amanda'
        $sql = "SELECT * FROM tbl_izin WHERE keperluan = 'Alfa' and nama_pengusul = 'Amanda'";

        // Menjalankan query SQL dan mengembalikan hasilnya
        return $this->connect->query($sql);
    }
}
?>
```

## Hasil Tampilan :<br><br>
**1. Tampilan Role Owner**<br>
Menampilkan seluruh data izin ketidakhadiran pegawai yang hanyab bisa diakses oleh Owner :<br>
![image](https://github.com/user-attachments/assets/3755de36-2fd8-48a6-9104-403c5293f993)
<br><br>

**2. Tampilan Role Pegawai**<br>
**- Role Pegawai Sakit**<br>
Menampilkan data izin ketidakhadiran pegawai yang hanya menampilkan data izin Sakit 'Amanda' yang bisa diakses oleh pegawai 'Amanda' dan dapat diakses oleh Owner :<br>
![image](https://github.com/user-attachments/assets/be470e36-db84-4192-a49c-714d52a76746)<br><br>

**- Role Pegawai Cuti**<br>
Menampilkan data izin ketidakhadiran pegawai yang hanya menampilkan data izin Cuti 'Amanda' yang bisa diakses oleh pegawai 'Amanda' dan dapat diakses oleh Owner :<br>
![image](https://github.com/user-attachments/assets/d85b1aca-5698-4c79-9be1-30a03886f5ac)<br><br>

**- Role Pegawai Alfa**<br>
Menampilkan data izin ketidakhadiran pegawai yang hanya menampilkan data izin Alfa 'Amanda' yang bisa diakses oleh pegawai 'Amanda' dan dapat diakses oleh Owner :<br>
![image](https://github.com/user-attachments/assets/3d658de0-f1f7-433c-b39b-4f157c92c1ff)




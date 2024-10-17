<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    /* Menambahkan border pada elemen tabel, th (header tabel), dan td (sel tabel) */
    table, th, td {
      border:1px solid black;
    }
  </style>
  <title>Tugas 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Memasukkan Bootstrap CSS dari CDN untuk tampilan responsif -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Memasukkan Bootstrap JS dari CDN untuk fungsionalitas dropdown dan fitur lainnya -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Membuat navigasi bar menggunakan Bootstrap -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Mengatur elemen navigasi dengan kolom yang dapat diperluas -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <!-- Link untuk halaman Owner -->
        <li class="nav-item">
          <a class="nav-link" href="beranda.php">Owner</a>
        </li>  
        <!-- Dropdown menu untuk data Pegawai -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Pegawai</a>
          <ul class="dropdown-menu">
            <!-- Menu pilihan untuk menampilkan data Sakit, Cuti, dan Alfa -->
            <li><a class="dropdown-item" href="tampil_sakit.php">Sakit</a></li>
            <li><a class="dropdown-item" href="tampil_cuti.php">Cuti</a></li>
            <li><a class="dropdown-item" href="tamppil_alfa.php">Alfa</a></li>
          </ul>
        </li>
      </ul>
    </div>
</nav>

<!-- Kontainer untuk menampilkan judul dan tabel data -->
<div class="container-fluid mt-3 table-responsive">
  <h3>Data Izin Sakit Pegawai</h3>
  <p></p> <!-- Placeholder untuk deskripsi atau informasi tambahan -->
</div>

<!-- Membuat tabel untuk menampilkan data izin sakit -->
<thead class="table-dark">
  <table class="table table-bordered">
  <tr>
    <!-- Header tabel yang mencantumkan nama-nama kolom -->
    <th scope="col">izin_id</th>
    <th>keperluan</th>
    <th>tgl_mulai_izin</th>
    <th>durasi_izin_hari</th>
    <th>nama_pengusul</th>
    <th>tgl_usul</th>
    <th>ttd_pengusul</th>
    <th>putusan</th>
    <th>ttd_atasan</th>
    <th>catatan</th>
  </tr>

  <tbody>
    <?php
    // Menggunakan file sakit.php yang berisi class 'Sakit'
    include('sakit.php');

    // Membuat objek dari class Sakit
    $sakit = new Sakit();

    // Memanggil method tampilData untuk mengambil data dari database
    $data = $sakit->tampilData();

    // Jika data tidak kosong, maka data akan ditampilkan
    if (!empty($data)){
      $no = 1; // Variabel untuk penomoran baris

      // Perulangan untuk setiap baris data yang diambil dari database
      foreach ($data as $row) {
    ?>

    <!-- Menampilkan data di setiap baris tabel -->
    <tr>
      <td><?php echo $row['izin_id'] ?></td>
      <td><?php echo $row['keperluan'] ?></td>
      <td><?php echo $row['tgl_mulai_izin'] ?></td>
      <td><?php echo $row['durasi_izin_hari'] ?></td>
      <td><?php echo $row['nama_pengusul'] ?></td>
      <td><?php echo $row['tgl_usul'] ?></td>
      <td><?php echo $row['ttd_pengusul'] ?></td>
      <td><?php echo $row['putusan'] ?></td>
      <td><?php echo $row['ttd_atasan'] ?></td>
      <td><?php echo $row['catatan'] ?></td>
    </tr>

    <!-- Penutup tag tbody untuk setiap baris data -->
    <tbody>
    <?php 
      }
    } else {
        // Jika data kosong, menampilkan pesan "Tidak ada data"
        echo "<tr><td colspan='16'> Tidak ada data</td></tr>";
    }
    ?>
  </tbody>
 </table>

</body>
</html>

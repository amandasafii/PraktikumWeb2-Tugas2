<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    /* Menambahkan border ke table, th, dan td */
    table, th, td {
      border:1px solid black;
    }
  </style>
  <title>Tugas 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Menambahkan Bootstrap untuk tampilan dan komponen -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Membuat navigation bar menggunakan Bootstrap -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <!-- Link ke halaman beranda (Owner) -->
        <a class="nav-link" href="beranda.php">Owner</a>
      </li>
      <li class="nav-item dropdown">
        <!-- Dropdown untuk pegawai dengan beberapa pilihan data -->
        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">Pegawai</a>
        <ul class="dropdown-menu">
          <!-- Pilihan data yang bisa ditampilkan, seperti sakit, cuti, dan alfa -->
          <li><a class="dropdown-item" href="tampil_sakit.php">Sakit</a></li>
          <li><a class="dropdown-item" href="tampil_cuti.php">Cuti</a></li>
          <li><a class="dropdown-item" href="tampil_alfa.php">Alfa</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!-- Bagian kontainer untuk menampilkan judul halaman dan deskripsi -->
<div class="container-fluid mt-3 table-responsive">
  <h3>Data Alfa Pegawai</h3>
  <p></p>
</div>

<!-- Membuat tabel untuk menampilkan data 'Alfa' dari database -->
<thead class="table-dark">
  <table class="table table-bordered ">
    <!-- Header tabel dengan kolom yang sesuai dengan database -->
    <tr>
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
      // Menyertakan file 'alfa.php' yang berisi class 'Alfa'
      include('alfa.php');
      
      // Membuat objek 'alfa' dari class 'Alfa' dan memanggil method 'tampilData'
      $alfa = new Alfa();
      $data = $alfa->tampilData(); // Mengambil data dari tabel dengan keperluan 'Alfa'

      // Mengecek apakah data tidak kosong
      if (!empty($data)) {
        $no = 1; // Untuk menomori data

        // Menggunakan perulangan untuk menampilkan setiap baris data
        foreach ($data as $row) {
      ?>
        <!-- Menampilkan data dalam bentuk tabel -->
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

        <!-- Penutup tbody -->
        <tbody>
      <?php 
        }
      } else {
          // Jika data kosong, menampilkan pesan bahwa tidak ada data
          echo "<tr><td colspan='16'> Tidak ada data</td></tr>";
      }
      ?>
    </tbody>
  </thead>
 </table>

</body>
</html>

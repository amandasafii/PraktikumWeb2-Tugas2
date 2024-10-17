<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    /* Menambahkan border pada tabel, th (header tabel), dan td (sel tabel) */
    table, th, td {
      border:1px solid black;
    }
  </style>
  <title>Tugas 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Menghubungkan dengan Bootstrap CSS untuk styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Menghubungkan dengan Bootstrap JS untuk fungsionalitas -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Membuat navigation bar menggunakan Bootstrap -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Membuat kolom yang bisa diperluas saat layar lebih besar -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <!-- Membuat menu Owner dengan link ke halaman beranda -->
      <li class="nav-item">
        <a class="nav-link" href="beranda.php">Owner</a>
      </li>  
      <!-- Membuat dropdown menu untuk data pegawai -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="beranda.php" role="button" data-bs-toggle="dropdown">Pegawai</a>
        <ul class="dropdown-menu">
          <!-- Tiga pilihan dalam dropdown: Sakit, Cuti, Alfa -->
          <li><a class="dropdown-item" href="tampil_sakit.php">Sakit</a></li>
          <li><a class="dropdown-item" href="tampil_cuti.php">Cuti</a></li>
          <li><a class="dropdown-item" href="tampil_alfa.php">Alfa</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!-- Bagian utama halaman yang memuat judul dan deskripsi -->
<div class="container-fluid mt-3 table-responsive">
  <h3>Data Izin Cuti Pegawai</h3>
  <p></p>
</div>

<!-- Membuat tabel untuk menampilkan data dari database -->
<thead class="table-dark">
  <table class="table table-bordered">
    <!-- Baris pertama adalah header tabel -->
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
      // Menyertakan file 'cuti.php' yang berisi class 'Cuti'
      include('cuti.php');

      // Membuat objek 'cuti' dari class 'Cuti'
      $cuti = new Cuti();

      // Mengambil data izin cuti dari database dengan method 'tampilData'
      $data = $cuti->tampilData();

      // Mengecek apakah data yang diambil tidak kosong
      if (!empty($data)){
        $no = 1; // Penomoran data

        // Perulangan untuk menampilkan setiap data cuti ke dalam tabel
        foreach ($data as $row) {
      ?>
      <!-- Menampilkan setiap data pada tabel -->
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
          // Jika tidak ada data yang tersedia, menampilkan pesan 'Tidak ada data'
          echo "<tr><td colspan='16'> Tidak ada data</td></tr>";
      }
      ?>
    </tbody>
  </thead>
 </table>

</body>
</html>

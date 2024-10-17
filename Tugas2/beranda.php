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

<!-- Tabel untuk menampilkan data izin -->
<div class="container-fluid mt-3 table-responsive">
  <table class="table">
    <tr>
      <!-- Judul Kolom pada Tabel -->
      <th scope="col">izin_id</th>
      <th>keperluan</th>
      <th>tgl_mulai_izin</th>
      <th>durasi_izin_hari</th>
      <th>nama_pengusul</th>
      <th>tgl_usul</th>
      <th>ttd_pengusul</th>
      <th>putusan</th>
      <th>tgl_disetujui</th>
      <th>ttd_atasan</th>
      <th>catatan</th>
      
    </tr>
    
    <tbody>
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
        <!-- Menampilkan data per baris -->
        <tr>
          <td><?php echo $row['izin_id'] ?></td>
          <td><?php echo $row['keperluan'] ?></td>
          <td><?php echo $row['tgl_mulai_izin'] ?></td>
          <td><?php echo $row['durasi_izin_hari'] ?></td>
          <td><?php echo $row['nama_pengusul'] ?></td>
          <td><?php echo $row['tgl_usul'] ?></td>
          <td><?php echo $row['ttd_pengusul'] ?></td>
          <td><?php echo $row['putusan'] ?></td>
          <td><?php echo $row['tgl_disetujui'] ?></td>
          <td><?php echo $row['ttd_atasan'] ?></td>
          <td><?php echo $row['catatan'] ?></td>
        </tr>
      <?php 
      }
      } else { // Jika data kosong, tampilkan pesan
          echo "<tr><td colspan='16'> Tidak ada data</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

</body> 
</html>

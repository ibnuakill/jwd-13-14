<?php
if ($_POST) {

   include_once("connection.php");

   // Sanitize and fetch the POST data
   $id_paket_wisata = mysqli_real_escape_string($conn, $_POST['nama_paket']);
   $nama_pemesan = mysqli_real_escape_string($conn, $_POST['nama_pemesan']);
   $no_tlp = mysqli_real_escape_string($conn, $_POST['no_tlp']);
   $tgl_pesan = mysqli_real_escape_string($conn, $_POST['tgl_pesan']);
   $jumlah_hari = mysqli_real_escape_string($conn, $_POST['jumlah_hari']);
   $jumlah_peserta = mysqli_real_escape_string($conn, $_POST['jumlah_peserta']);

   // Handle checkbox options
   $layanan_penginapan = isset($_POST['layanan_penginapan']) ? "Y" : "N";
   $layanan_transportasi = isset($_POST['layanan_transportasi']) ? "Y" : "N";
   $layanan_makan = isset($_POST['layanan_makan']) ? "Y" : "N";

   // Process the price values (remove dots and convert to integers)
   $harga_paket_str = str_replace(".", "", $_POST['harga_paket']);
   $harga_paket = (int)$harga_paket_str;

   $jumlah_tagihan_str = str_replace(".", "", $_POST['jumlah_tagihan']);
   $jumlah_tagihan = (int)$jumlah_tagihan_str;

   if (isset($_POST['layanan_penginapan'])) {
      $layanan_penginapan = 1;
   } else {
      $layanan_penginapan = 0;
   }

   if (isset($_POST['layanan_transportasi'])) {
      $layanan_transportasi = 1;
   } else {
      $layanan_transportasi = 0;
   }

   if (isset($_POST['layanan_makan'])) {
      $layanan_makan = 1;
   } else {
      $layanan_makan = 0;
   }

   $sql = "INSERT INTO daftar_pesanan (
              id_paket_wisata, 
              nama_pemesan, 
              no_tlp, 
              tanggal_pemesanan, 
              jumlah_peserta, 
              jumlah_hari, 
              akomodasi, 
              transportasi, 
              service_makanan,  -- Updated to integer values
              harga_paket, 
              total_tagihan
          ) VALUES (
              '$id_paket_wisata', 
              '$nama_pemesan', 
              '$no_tlp', 
              '$tgl_pesan', 
              '$jumlah_peserta', 
              '$jumlah_hari', 
              '$layanan_penginapan',  -- Integer value (1 or 0)
              '$layanan_transportasi',  -- Integer value (1 or 0)
              '$layanan_makan',  -- Integer value (1 or 0)
              '$harga_paket', 
              '$jumlah_tagihan'
          )";



   // Execute the query and check for errors
   if (mysqli_query($conn, $sql)) {
      header("Location: list_pemesanan.php");
      exit(); // Make sure to exit after a header redirect
   } else {
      echo "Error: " . mysqli_error($conn); // Display an error message if the query fails
   }

   // Close the database connection
   mysqli_close($conn);
}

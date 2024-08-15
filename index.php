<?php
include "koneksi.php";
$aktif_menu = "beranda";
include "header.php";
?>

<div class="main-container">
  <div class="second-container">
    <div class="info-container">
      <?php
      $sql = "SELECT * FROM paket_wisata";
      $result = mysqli_query($conn, $sql);
      while ($data_paket = mysqli_fetch_array($result)) :
        $path_gambar = "images/" . $data_paket['img_paket'];
      ?>
        <div class="paket-container">
          <img src="<?php echo $path_gambar; ?>" alt="paket camping" />
          <h4><?php echo $data_paket['nama_paket']; ?></h4>
          <p><?php echo $data_paket['deskripsi_paket']; ?></p>
          <a href="form_pendaftaran.php?id_paket_wisata=<?php echo $data_paket['id_paket_wisata']; ?>" class="button-89">Daftar Paket</a>
        </div> <!-- Close .paket-container here -->

      <?php endwhile; ?>
    </div> <!-- Close .info-container here -->

    <div class="promosi-container">
      <div class="video-container">
        <h4>Video Promosi</h4>
        <iframe
          width="560"
          height="315"
          src="https://www.youtube.com/embed/dQw4w9WgXcQ"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <?php include "footer.php"; ?>
</div>
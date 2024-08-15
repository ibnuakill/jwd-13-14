<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    function renderAktifMenu($val1, $val2)
    {
        $result = "";
        if ($val1 == $val2) {
            $result = "active-menu";
        }
        return  $result;
    }
    ?>
    <div class="main-container">
        <div class="header-title">
            <h1>Selamat Datang di Desa Wisata Pulesari</h1>
        </div>
        <div class="img-header">
            <img src="images/header-1.jpg" alt="Camping" />
            <img src="images/header-3.jpg" alt="kebun teh" />
            <img src="images/header-4.webp" alt="Camping" />
            <img src="images/header-5.jpg" alt="kebun bunga" />
            <img src="images/header-6.jpg" alt="high land" />
        </div>

        <div class="menu-header">
            <a class="<?php echo renderAktifMenu($aktif_menu, "beranda") ?>" href="index.php">Beranda</a>

            <a class="<?php echo renderAktifMenu($aktif_menu, "form_pendaftaran") ?>" href="form_pendaftaran.php">Daftar Paket Wisata</a>

            <a class="<?php echo renderAktifMenu($aktif_menu, "edit_pemesanan") ?>" href="edit_pemesanan.php">Modifikasi Pesanan</a>
        </div>
    </div>
</body>

</html>
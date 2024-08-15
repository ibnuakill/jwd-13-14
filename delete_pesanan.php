<?php

include_once("connection.php");

if ($_GET) {

    $id_daftar_pesanan = $_GET['id_daftar_pesanan'];

    //buat query
    $sql = "DELETE FROM daftar_pesanan WHERE id_daftar_pesanan=$id_daftar_pesanan";

    mysqli_query($conn, $sql);
    header("Location: list_pemesanan.php");
}

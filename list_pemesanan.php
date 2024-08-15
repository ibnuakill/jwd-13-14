<?php
include_once("connection.php");

$aktif_menu = "list_pendaftaran";

include_once("header.php");

include_once("header.php");

?>

<div class="main-container">
    <div class="list-container">
        <h2>Daftar Pesanan</h2>
        <div class="form-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Paket Wisata</th>
                        <th>Nama Pemesan</th>
                        <th>Phone</th>
                        <th>Jumlah Peserta</th>
                        <th>Jumlah Hari</th>
                        <th>Akomodasi</th>
                        <th>Transportasi</th>
                        <th>Service / Makanan</th>
                        <th>Harga Paket</th>
                        <th>Total Tagihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //$sql = "SELECT * FROM daftar_pesanan";

                    $sql = "SELECT dp.*, pw.nama_paket FROM daftar_pesanan dp JOIN paket_wisata pw ON dp.id_paket_wisata = pw.id_paket_wisata";
                    $results = mysqli_query($conn, $sql);

                    $i = 1;
                    while ($data_pesanan = mysqli_fetch_array($results)) {
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data_pesanan['nama_paket']; ?></td>
                            <td><?php echo $data_pesanan['nama_pemesan']; ?></td>
                            <td><?php echo $data_pesanan['no_tlp']; ?></td>
                            <td><?php echo $data_pesanan['jumlah_peserta']; ?></td>
                            <td><?php echo $data_pesanan['jumlah_hari']; ?></td>
                            <td><?php echo $data_pesanan['akomodasi']; ?></td>
                            <td><?php echo $data_pesanan['transportasi']; ?></td>
                            <td><?php echo $data_pesanan['service_makanan']; ?></td> <!-- Updated this line -->
                            <td><?php echo number_format($data_pesanan['harga_paket'], 0, ',', '.'); ?></td>
                            <td><?php echo number_format($data_pesanan['total_tagihan'], 0, ',', '.'); ?></td>
                            <td>
                                <div class="btn-link">
                                    <a href="form_edit.php?id_daftar_pesanan=<?php echo $data_pesanan['id_daftar_pesanan']; ?>">Edit</a>
                                    <a href="delete_pesanan.php?id_daftar_pesanan=<?php echo $data_pesanan['id_daftar_pesanan']; ?>">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <?php
    include_once("footer.php");
    ?>
</div>
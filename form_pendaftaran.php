<?php

include_once("koneksi.php");
$aktif_menu = "form_pendaftaran";
include_once("header.php");

function selectedPaketWisata($val1, $val2)
{
    $result = "";
    if ($val1 == $val2) {
        $result = "selected";
    }
    return $result;
}

if ($_GET) {
    $id_paket_wisata = $_GET['id_paket_wisata'];
} else {
    $id_paket_wisata = 1;
}
$sql_selected_paket = "SELECT * FROM paket_wisata WHERE id_paket_wisata = $id_paket_wisata";
$selected_paket = mysqli_query($conn, $sql_selected_paket);

while ($row = mysqli_fetch_array($selected_paket)) {
    $kode_paket_wisata = $row['id_paket_wisata'];
    $nama_paket = $row['nama_paket'];
    $harga_penginapan = $row['harga_penginapan'];
    $harga_transportasi = $row['harga_transportasi'];
    $harga_makan = $row['harga_servis_makan'];
}


// // Cek apakah 'id_paket_wisata' ada di URL, jika tidak, atur ke nilai default
// $id_paket_wisata = isset($_GET['id_paket_wisata']) ? (int) $_GET['id_paket_wisata'] : 1;



// // Inisialisasi variabel untuk menghindari notice variabel undefined
// $kode_paket_wisata = $nama_paket = $harga_penginapan = $harga_transportasi = $harga_makan = "";


?>

<div class="main-container">
    <div class="form-container">
        <h2>Form Pemesanan Paket Wisata</h2>
        <form action="" method="POST">
            <label for="nama_paket">Nama Paket</label>
            <select name="nama_paket" id="nama_paket">
                <?php

                $sql = "SELECT * FROM  paket_wisata";
                $results = mysqli_query($conn, $sql);
                while ($data_paket = mysqli_fetch_array($results)) {
                ?>
                    <option
                        value="<?php echo $data_paket['id_paket_wisata'] ?>"
                        <?php
                        echo selectedPaketWisata($data_paket['nama_paket'], $nama_paket);
                        ?>>
                        <?php echo $data_paket['nama_paket'] ?>
                    </option>
                <?php
                }
                ?>


            </select>

            <label for="nama_pemesan">Nama Pemesan</label>
            <input type="text" name="nama_pemesan" id="nama_pemesan">
            <label for="no_tlp">No Tlp/Hp</label>
            <input type="text" name="no_tlp" id="no_tlp">
            <label for="tgl_pesan">Tanggal Pesan</label>
            <input type="date" name="tgl_pesan" id="tgl_pesan">
            <label for="jumlah_hari">Waktu Pelaksanaan Perjalanan</label>
            <input type="number" name="jumlah_hari" id="jumlah_hari">

            <div class="layanan-container">
                <div class="item-layanan">
                    <label
                        for="layanan_penginapan">Penginapan
                        <?php
                        echo "" . number_format($harga_penginapan, 0, ',', '.');
                        ?>
                    </label>
                    <input type="checkbox" name="layanan_penginapan" id="layanan_penginapan" value="<?php echo $harga_penginapan; ?>">
                </div>

                <div class="item-layanan">
                    <label
                        for="layanan_transportasi">Transportasi
                        <?php
                        echo "" . number_format($harga_transportasi, 0, ',', '.');
                        ?>
                    </label>
                    <input type="checkbox" name="layanan_transportasi" id="layanan_transportasi" value="<?php echo $harga_transportasi ?>">
                </div>

                <div class="item-layanan">
                    <label
                        for="layanan_makan">Service Makan
                        <?php
                        echo "" . number_format($harga_makan, 0, ',', '.');
                        ?>
                    </label>
                    <input type="checkbox" name="layanan_makan" id="layanan_makan" value="<?php echo $harga_makan; ?>">
                </div>
            </div>

            <label for="jumlah_peserta">Jumlah Peserta</label>
            <input type="number" name="jumlah_peserta" id="jumlah_peserta">
            <label for="harga_paket">Harga Paket Perjalanan</label>
            <input type="text" name="harga_paket" id="harga_paket">
            <label for="jumlah_tagihan">Jumlah Tagihan</label>
            <input type="text" name="jumlah_tagihan" id="jumlah_tagihan">


            <div class="btn-container">
                <input type="submit" value="Simpan">
                <button id="btn-hitung" type="button">Hitung</button>
                <button id="btn-reset" type="reset">Reset</button>
            </div>
        </form>
        <?php include_once("footer.php"); ?>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#nama_paket").on('change', function() {
            var idPaket = $(this).val();

            if (idPaket) {
                window.location.href = 'form_pendaftaran.php?id_paket_wisata=' + idPaket;
            }
        });
    });

    $("btn-hitung").on('click', function() {
        event.preventDefault();
        var harga_penginapan = 0;
        var harga_transportasi = 0;
        var harga_makan = 0;

        if ($("#layanan_penginapan").is(":checked")) {
            harga_penginapan = $("#layanan_penginapan").val();
        }
        if ($("#layanan_transportasi").is(":checked")) {
            harga_penginapan = $("#layanan_penginapan").val();
        }
        if ($("#layanan_makan").is(":checked")) {
            harga_penginapan = $("#layanan_penginapan").val();
        }

        var harga_paket = parseInt(harga_penginapan) + parseInt(harga_transportasi) + parseInt(harga_makan);

        $("#harga_paket").val(harga_paket);
        alert(harga_paket);
    });
</script>
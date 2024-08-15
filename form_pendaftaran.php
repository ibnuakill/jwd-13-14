<?php
include_once("connection.php");

$aktif_menu = "form_pendaftaran";

include_once("header.php");

function selectedPaketWisata($val1, $val2)
{
    return $val1 == $val2 ? "selected" : "";
}

// Check if 'id_paket_wisata' is present in the URL, if not, set a default value
$id_paket_wisata = isset($_GET['id_paket_wisata']) ? $_GET['id_paket_wisata'] : 1;

$sql_selected_paket = "SELECT * FROM paket_wisata WHERE id_paket_wisata = $id_paket_wisata";
$selected_paket = mysqli_query($conn, $sql_selected_paket);

// Initialize the variables to avoid undefined variable notices
$kode_paket_wisata = $nama_paket = $harga_penginapan = $harga_transportasi = $harga_makan = "";

while ($row = mysqli_fetch_array($selected_paket)) {
    $kode_paket_wisata = $row['id_paket_wisata'];
    $nama_paket = $row['nama_paket'];
    $harga_penginapan = $row['harga_penginapan'];
    $harga_transportasi = $row['harga_transportasi'];
    $harga_makan = $row['harga_servis_makan'];
}
?>

<div class="main-container">
    <div class="form-container">
        <h2>Form Pemesanan Paket Wisata</h2>
        <form action="proses_tambah.php" method="post">

            <label for="nama_paket">Nama Paket</label>

            <select name="nama_paket" id="nama_paket">
                <?php

                if (isset($_GET['id_paket_wisata'])) {
                    $id_paket_wisata = $_GET['id_paket_wisata'];
                    echo $id_paket_wisata;
                }


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
            <input type="text" name="nama_pemesan" id="nama_pemesan" required>

            <label for="no_tlp">No Tlp/Hp</label>
            <input type="text" name="no_tlp" id="no_tlp" required>

            <label for="tgl_pesan">Tanggal Pesan</label>
            <input type="date" name="tgl_pesan" id="tgl_pesan" required>

            <label for="jumlah_hari">Waktu Pelaksanaan Perjalanan</label>
            <input type="number" name="jumlah_hari" id="jumlah_hari" value="1">

            <label for="jumlah_hari">Pelayanan Paket Perjalanan</label>


            <div class="layanan-container">
            </div>

            <div class="item-layanan">
                <label
                    for="layanan_penginapan">Penginapan
                    <?php

                    echo "" . number_format($harga_penginapan, 0, ',', '.');

                    ?>
                </label>
                <input type="checkbox" name="layanan_penginapan" id="layanan_penginapan" value="<?php echo $harga_penginapan; ?>" checked>
            </div>


            <div class="item-layanan">
                <label
                    for="layanan_transportasi">Transportasi
                    <?php

                    echo "" . number_format($harga_transportasi, 0, ',', '.');

                    ?>
                </label>
                <input type="checkbox" name="layanan_transportasi" id="layanan_transportasi" value="<?php echo $harga_transportasi; ?>" checked>
            </div>

            <div class="item-layanan">
                <label
                    for="layanan_makan">Service Makan
                    <?php

                    echo "" . number_format($harga_makan, 0, ',', '.');

                    ?>
                </label>
                <input type="checkbox" name="layanan_makan" id="layanan_makan" value="<?php echo $harga_makan; ?>" checked>
            </div>

    </div> <!-- end of layanan-container -->


    <label for="jumlah_peserta">Jumlah Peserta</label>
    <input type="number" name="jumlah_peserta" id="jumlah_peserta" value="1">

    <label for="harga_paket">Harga Paket Perjalanan</label>
    <input type="text" name="harga_paket" id="harga_paket" required>

    <label for="jumlah_tagihan">Jumlah Tagihan</label>
    <input type="text" name="jumlah_tagihan" id="jumlah_tagihan" required>



    <div class="btn-container">
        <input type="submit" value="Simpan">

        <button id="btn-hitung">Hitung</button>

        <button id="btn-reset">Reset</button>
    </div>

    </form>
    <?php
    include_once("footer.php");
    ?>
</div> <!-- end of form-container -->



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#nama_paket").on('change', function() {
            var idPaket = $(this).val();

            if (idPaket) {
                window.location.href = 'form_pendaftaran.php?id_paket_wisata=' + idPaket;
            }
        });


        $("#btn-hitung").on('click', function() {
            event.preventDefault();
            //alert("tombol di click");

            var harga_penginapan = 0;
            var harga_transportasi = 0;
            var harga_makan = 0;


            if ($('#layanan_penginapan').is(':checked')) {
                harga_penginapan = $('#layanan_penginapan').val();
                // Ambil nilai dari checkbox jika tercentang
            }

            if ($('#layanan_transportasi').is(':checked')) {
                harga_transportasi = $('#layanan_transportasi').val();
                // Ambil nilai dari checkbox jika tercentang
            }

            if ($('#layanan_makan').is(':checked')) {
                harga_makan = $('#layanan_makan').val();
                // Ambil nilai dari checkbox jika tercentang
            }

            jumlah_hari = $('#jumlah_hari').val();
            jumlah_peserta = $('#jumlah_peserta').val();


            var harga_paket = parseInt(harga_penginapan) + parseInt(harga_transportasi) + parseInt(harga_makan);

            var harga_paket_formated = harga_paket.toLocaleString('de-DE');


            var jumlah_tagihan = harga_paket * parseInt(jumlah_hari) * parseInt(jumlah_peserta);

            var jumlah_tagihan_formated = jumlah_tagihan.toLocaleString('de-DE');


            if ((jumlah_peserta < 1) || (jumlah_hari < 1)) {
                alert("Jumlah hari dan jumlah peserta minimal 1");
            } else {
                if (parseInt(harga_transportasi) > 0) {
                    $('#harga_paket').val(harga_paket_formated);
                    $('#jumlah_tagihan').val(jumlah_tagihan_formated);
                } else {
                    alert("Wajib menyertakan Paket Transportasi");
                }

            }


        })


        $("#btn-reset").on('click', function() {
            event.preventDefault();
            $('#harga_paket').val("");
            $('#jumlah_tagihan').val("");
            $('#jumlah_hari').val("1");
            $('#jumlah_peserta').val("1");
            $('#layanan_makan').prop('checked', true);
            $('#layanan_penginapan').prop('checked', true);
            $('#layanan_transportasi').prop('checked', true);

        })













    });
</script>
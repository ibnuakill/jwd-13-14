<?php

include_once("koneksi.php");
$aktif_menu = "edit_paket";
include_once("header.php");

function selectedPaketWisata($val1, $val2)
{
    $result = "";
    if ($val1 == $val2) {
        $result = "selected";
    }
    return $result;
}

// Cek apakah ada parameter id_paket_wisata yang dikirim melalui URL
if (isset($_GET['id_paket_wisata'])) {
    $id_paket_wisata = $_GET['id_paket_wisata'];

    // Ambil data paket wisata berdasarkan id_paket_wisata
    $sql_selected_paket = "SELECT * FROM paket_wisata WHERE id_paket_wisata = $id_paket_wisata";
    $selected_paket = mysqli_query($conn, $sql_selected_paket);

    if (mysqli_num_rows($selected_paket) > 0) {
        $row = mysqli_fetch_array($selected_paket);
        $nama_paket = $row['nama_paket'];
        $harga_penginapan = $row['harga_penginapan'];
        $harga_transportasi = $row['harga_transportasi'];
        $harga_makan = $row['harga_servis_makan'];
    } else {
        echo "Paket wisata tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Paket Wisata tidak ditemukan.";
    exit;
}

// Handle form submission untuk update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_paket = $_POST['nama_paket'];
    $harga_penginapan = $_POST['harga_penginapan'];
    $harga_transportasi = $_POST['harga_transportasi'];
    $harga_makan = $_POST['harga_makan'];

    // Update data di database
    $sql_update = "UPDATE paket_wisata SET 
        nama_paket = '$nama_paket',
        harga_penginapan = '$harga_penginapan',
        harga_transportasi = '$harga_transportasi',
        harga_servis_makan = '$harga_makan'
        WHERE id_paket_wisata = $id_paket_wisata";

    if (mysqli_query($conn, $sql_update)) {
        echo "Data paket wisata berhasil diperbarui!";
        header("Location: form_pendaftaran.php?id_paket_wisata=" . $id_paket_wisata); // Redirect setelah update
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<div class="main-container">
    <div class="form-container">
        <h2>Edit Paket Wisata</h2>
        <form action="edit.php?id_paket_wisata=<?php echo $id_paket_wisata; ?>" method="POST">
            <label for="nama_paket">Nama Paket</label>
            <input type="text" name="nama_paket" id="nama_paket" value="<?php echo $nama_paket; ?>" required>

            <label for="harga_penginapan">Harga Penginapan</label>
            <input type="number" name="harga_penginapan" id="harga_penginapan" value="<?php echo $harga_penginapan; ?>" required>

            <label for="harga_transportasi">Harga Transportasi</label>
            <input type="number" name="harga_transportasi" id="harga_transportasi" value="<?php echo $harga_transportasi; ?>" required>

            <label for="harga_makan">Harga Service Makan</label>
            <input type="number" name="harga_makan" id="harga_makan" value="<?php echo $harga_makan; ?>" required>

            <div class="btn-container">
                <input type="submit" value="Update">
                <a href="form_pendaftaran.php" class="btn-cancel">Batal</a>
            </div>
        </form>
        <?php include_once("footer.php"); ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<?php include_once("footer.php"); ?>
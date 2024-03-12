<?php 
include ("koneksi.php");

if(isset($_POST['save'])) {
    // Ambil data dari form
    $id = $_POST['id'];
    $idcard = $_POST['idcard'];
    $val = $_POST['val'];
    $nama = $_POST['nama'];
    $timestamp = $_POST['timestamp'];

    // Query SQL untuk melakukan update data
    $sql = "UPDATE rfid SET idcard='$idcard', val='$val', nama='$nama', timestamp='$timestamp' WHERE id='$id'";
    $query = mysqli_query($konek, $sql);

    if($query) {
        // Jika query berhasil dieksekusi, alihkan kembali ke halaman utama
        header('Location: absensi.php');
    } else {
        // Jika query gagal dieksekusi, tampilkan pesan kesalahan
        echo "Gagal menyimpan data.";
    }
} else {
    // Jika tidak ada data yang dikirim melalui form, alihkan kembali ke halaman utama
    header('Location: absensi.php');
}
?>

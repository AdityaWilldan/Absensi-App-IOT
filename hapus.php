<?php 
include("koneksi.php");


if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($konek, $_GET['id']);
    $sql = "DELETE FROM rfid WHERE id = '$id'";
    $query = mysqli_query($konek, $sql);

    if($query){
    header("Location: absensi.php");
    } else{
        echo "Gagal menghapus data.";
    }
} 
else{
    header("Location: absensi.php");
}

?>
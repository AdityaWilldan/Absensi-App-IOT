<?php 
include ("koneksi.php");

if(!isset($_GET['id'])){
    header('Location: absensi.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM rfid WHERE id=$id";
$query = mysqli_query($konek, $sql);
$data = mysqli_fetch_assoc($query);


if(mysqli_num_rows($query) < 1){
    die("data tidak di temukan..");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
    <header class="text-center">
        <h3>Absen Mahasiswa</h3>
    </header>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
            <form action="logic_edit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <div class="form-group text-center">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control text-center" name="idcard" placeholder="ID CARD" value="<?php echo $data['idcard'] ?>">
            </div>

            <div class="form-group text-center">
                <label for="npm">Npm:</label>
                <input type="text" class="form-control text-center" name="val" placeholder="value" value="<?php echo $data['val'] ?>">
            </div>

            <div class="form-group text-center">
                <label for="prodi">Prodi:</label>
                <input type="text" class="form-control text-center" name="nama" placeholder="nama" value="<?php echo $data['nama'] ?>">
            </div>

            <div class="form-group text-center">
            <label for="email">Email address</label>
            <input type="text" class="form-control text-center" name="timestamp" placeholder="Waktu" value="<?php echo $data['timestamp'] ?>">
            </div>
<!-- 
            <div class="form-group text-center">
                <label for="ormawa">Ormawa:</label>
                <textarea class="form-control text-center" name="ormawa" placeholder="Organisasi mahasiswa yang akan diikuti" ><?php echo $mahasiswa['ormawa'] ?></textarea>
            </div>

            <div class="mb-3">
            <label for="gambar">Gambar : </label> <br>
                <img src="img/<?= $mahasiswa['gambar']; ?>" width="40" alt="">
                <input type="file" name="gambar" id="gambar">
            </div> -->

                    <div class="text-center">
                    <button type="submit" class="btn btn-primary" value="save" name="save">simpan</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
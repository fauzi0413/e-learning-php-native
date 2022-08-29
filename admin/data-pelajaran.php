<?php
session_start();

$title = "Data Mata Pelajaran";

require '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['admin'];
}

$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
$data = mysqli_fetch_assoc($sql);

require '../function.php';

if (isset($_POST['tambah_kelas'])) {
    if (tambah_kelas($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil di Tambahkan !!');
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" href="./">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require 'navbar.php';
    ?>

    <div class="p-5">
        <h1 class="py-5 pb-3 text-center">Data Mata Pelajaran</h1>
        <div class="row">
            <div class="col-md-6">
                <h4 class="fw-bold">Data Mata Pelajaran Per Kelas</h4>
                <p>- Pilih Salah Satu Kelas -</p>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="col-md-3 text-center">No</th>
                            <th scope="col" class="">Nama Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;

                        $sql = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                        while ($data = mysqli_fetch_assoc($sql)) {
                            $no++;
                        ?>
                            <tr class="col">
                                <th scope="row" class="text-center"><?= $no ?></th>
                                <td class=""><a href="./data-mapel.php?kelas=<?= $data['nama_kelas'] ?>" class="text-decoration-none text-dark"><?= $data['nama_kelas'] ?></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-5 pt-4">
                <h4 class="text-center pb-3">List Mata Pelajaran</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="col-md-3 text-center">No</th>
                            <th scope="col" class="">Mata Pelajaran</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;

                        $sql = mysqli_query($conn, "SELECT * FROM list_pelajaran ORDER BY mata_pelajaran ASC");
                        while ($data = mysqli_fetch_assoc($sql)) {
                            $no++;
                        ?>
                            <tr class="col">
                                <th scope="row" class="text-center"><?= $no ?></th>
                                <td class="col-md-6"><?= $data['mata_pelajaran'] ?></td>
                                <td class="text-center col-md-4">
                                    <a href="./delete-mapel.php?mapel=<?= $data['kode_pelajaran'] ?>" class="text-decoration-none text-dark option">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="./create.php?cek=mapel" class="my-4 btn btn-primary w-100">Tambah Pelajaran</a>
            </div>
        </div>
    </div>
</body>

</html>
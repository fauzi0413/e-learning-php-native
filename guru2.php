<?php
session_start();

$title = "Home Page";

require 'koneksi.php';

if (!isset($_SESSION['guru'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['guru'];
}

$sql = mysqli_query($conn, "SELECT * FROM data_guru WHERE username = '$username' ");
$data = mysqli_fetch_assoc($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" href="./">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-light bg-light fixed-top p-0">
        <div class="container-fluid">
            <div class="header d-flex">
                <h1><i class="fas fa-user-circle p-3"></i></h1>
                <div class="name">
                    <h2 class="m-0 fw-bold"><?= $data['nama_guru'] ?></h2>
                    <span class="m-0"><?= $data['mata_pelajaran'] ?></span>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel" style="font-weight: bold;">Navbar Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1">
                        <li class="nav-item">
                            <a href="./guru.php" class="nav-link active">
                                <h6 id="offcanvasRightLabel">Beranda</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./guru/materi.php">
                                <h6 id="offcanvasRightLabel">Materi</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./guru/tugas.php">
                                <h6 id="offcanvasRightLabel">Tugas</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <h6 id="offcanvasRightLabel">Kuis</h6>
                            </a>
                        </li>
                        <li class="text-end position-absolute bottom-0 end-0 p-3">
                            <a href="./logout.php" class="btn btn-danger fw-bold">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <div class="p-5">
        <div class="row py-5">
            <!-- BODY PAGE -->
            <div class="col-md-8">

                <!-- ////////////////////// -->
                <!-- CONTENT MATERI HARI INI -->
                <!-- ////////////////////// -->

                <div class="pb-5">
                    <h3>MATERI HARI INI</h3>
                    <hr>
                    <div class="px-3 py-2">

                        <!-- CEK MATERI -->
                        <?php
                        // CEK TANGGAL
                        date_default_timezone_set('Asia/Jakarta');
                        // echo date('h:i:s');
                        $tanggal = date('Y-m-d');

                        $nama_penulis = $data['nama_guru'];
                        $sql_tanggal = mysqli_query($conn, "SELECT * FROM materi WHERE nama_penulis = '$nama_penulis' AND tanggal_unggah = '$tanggal' ");
                        $cek = mysqli_fetch_assoc($sql_tanggal);

                        if ($cek['tanggal_unggah'] == $tanggal) {
                            $nama_penulis = $data['nama_guru'];
                            $sql = mysqli_query($conn, "SELECT * FROM materi WHERE nama_penulis = '$nama_penulis' AND tanggal_unggah = '$tanggal' ");
                            while ($materi = mysqli_fetch_assoc($sql)) {
                        ?>

                                <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                    <h5 class="py-3">
                                        <?php
                                        $date = $materi['tanggal_unggah'];
                                        $tanggal = new DateTime($date);
                                        echo $tanggal->format('j F Y');
                                        ?>
                                    </h5>
                                    <div class="card my-3">
                                        <div class="card-body">
                                            <span><?= $materi['judul_materi'] ?> - <?= $materi['kelas'] ?></span>
                                            <a href="./guru/delete.php?cek=materi&id=<?= $materi['id'] ?>" class="btn btn-danger ms-2 float-end">Hapus</a>
                                            <a href="./guru/view-materi.php?id=<?= $materi['id'] ?>" class="btn btn-primary float-end">Lihat</a>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                        } else {
                            ?>

                            <div class="my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3"><?= date('j F Y') ?></h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Belum Terdapat Materi Baru</span>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>

                <div class="pb-5">
                    <h3>TUGAS HARI INI</h3>
                    <hr>
                    <div class="px-3 py-2">

                        <!-- CEK MATERI -->
                        <?php
                        // CEK TANGGAL
                        $tanggal = date('Y-m-d');
                        $sql_tanggal = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$nama_penulis' AND tanggal_unggah = '$tanggal' ");
                        $cek = mysqli_fetch_assoc($sql_tanggal);

                        if ($cek['tanggal_unggah'] == $tanggal) {
                            $nama_penulis = $data['nama_guru'];
                            $sql = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$nama_penulis' AND tanggal_unggah = '$tanggal' ");
                            while ($tugas = mysqli_fetch_assoc($sql)) {
                        ?>

                                <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                    <h5 class="py-3">
                                        <?php
                                        $date = $tugas['tanggal_unggah'];
                                        $tanggal = new DateTime($date);

                                        echo $tanggal->format('j F Y');
                                        ?>
                                    </h5>
                                    <div class="card my-3">
                                        <div class="card-body">
                                            <span><?= $tugas['judul_tugas'] ?> - <?= $tugas['kelas'] ?></span>
                                            <a href="./guru/delete.php?cek=tugas&id=<?= $tugas['id'] ?>" class="btn btn-danger ms-2 float-end">Hapus</a>
                                            <a href="./guru/view-tugas.php?id=<?= $tugas['id'] ?>" class="btn btn-primary float-end">Lihat</a>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                        } else {
                            ?>

                            <div class="my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3"><?= date('j F Y') ?></h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Belum Terdapat Tugas Baru</span>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-3">
                <div class="pt-3 row">
                    <div class="col-md-12 mb-3">
                        <a href="./guru/materi.php" class="btn btn-outline-primary p-2 mx-1 text-decoration-none w-100 text">
                            <i class="fas fa-book"></i>
                            <h4>Materi</h4>
                        </a>
                    </div>
                    <div class="col-md-12 mb-3">
                        <a href="./guru/tugas.php" class="btn btn-outline-primary p-2 mx-1 text-decoration-none w-100 text">
                            <i class="fas fa-clipboard-list"></i>
                            <h4>Tugas</h4>
                        </a>
                    </div>
                    <div class="col-md-12 mb-3">
                        <a href="" class="btn btn-outline-primary p-2 mx-1 text-decoration-none w-100 text">
                            <i class="fas fa-list-ol"></i>
                            <h4>Kuis</h4>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>

</body>

</html>
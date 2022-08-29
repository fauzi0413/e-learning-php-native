<?php
session_start();

$title = "Home Page";

require 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['user'];
}

$sql = mysqli_query($conn, "SELECT * FROM data_siswa WHERE username = '$username' ");
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
    <link rel="stylesheet" href="./style/style.css">

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
                    <h2 class="m-0 fw-bold"><?= $data['nama_siswa'] ?></h2>
                    <span class="m-0"><?= $data['kelas_siswa'] ?></span>
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
                            <a href="#" class="nav-link active">
                                <h6 id="offcanvasRightLabel">Dashboard</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <h6 id="offcanvasRightLabel">Materi</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <h6 id="offcanvasRightLabel">Tugas</h6>
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
                <h4><b>Selamat Datang <?= $data['username'] ?></b></h4>
                <!-- <?= date('D, j M Y') ?> -->
                <?= date('l, j F Y') ?>
                <div class="pt-3 row">
                    <div class="col-md-4">
                        <a href="" class="btn btn-outline-primary p-2 mx-1 text-decoration-none w-100 text">
                            <i class="fas fa-book"></i>
                            <h4>Materi</h4>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="" class="btn btn-outline-primary p-2 mx-1 text-decoration-none w-100 text">
                            <i class="fas fa-clipboard-list"></i>
                            <h4>Tugas</h4>
                        </a>
                    </div>
                </div>
                <div class="pt-5">

                    <!-- ////////////////////// -->
                    <!-- CONTENT MATERI HARI INI -->
                    <!-- ////////////////////// -->

                    <div class="pb-5">
                        <h3>MATERI HARI INI</h3>
                        <hr>
                        <div class="px-3 py-2">
                            <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3">Python</h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                            </div>

                            <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3">Bahasa Jepang</h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                            </div>

                            <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3">Pemrograman Berorientasi Objek</h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                            </div>

                            <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3">Kewirausahaan</h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                            </div>

                            <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3">Basis Data</h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ////////////////////// -->
                    <!-- CONTENT TUGAS HARI INI -->
                    <!-- ////////////////////// -->

                    <div class="">
                        <h3>TUGAS HARI INI</h3>
                        <hr>
                        <div class="px-4 py-2">
                            <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3">Python</h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                            </div>

                            <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3">Bahasa Jepang</h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                            </div>

                            <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3">Pemrograman Berorientasi Objek</h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                            </div>

                            <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3">Kewirausahaan</h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                            </div>

                            <div class="materi my-3 pb-3 px-4 bg-light rounded-3">
                                <h5 class="py-3">Basis Data</h5>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <span>Contoh</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-1"></div>


            <!-- SIDE PAGE -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Mata Pelajaran Hari ini</h4>
                    </div>

                    <?php
                    $waktu = date('l');
                    if ($waktu == "Monday") {
                        $kelas = $data['kelas_siswa'];
                        $sql = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$kelas' ");
                        $cek = mysqli_fetch_assoc($sql);
                    } elseif ($waktu == "Tuesday") {
                        $kelas = $data['kelas_siswa'];
                        $sql = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$kelas' ");
                        $cek = mysqli_fetch_assoc($sql);
                    } elseif ($waktu == "Wednesday") {
                        $kelas = $data['kelas_siswa'];
                        $sql = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$kelas' ");
                        $cek = mysqli_fetch_assoc($sql);
                    } elseif ($waktu == "Thursday") {
                        $kelas = $data['kelas_siswa'];
                        $sql = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$kelas' ");
                        $cek = mysqli_fetch_assoc($sql);
                    } elseif ($waktu == "Friday") {
                        $kelas = $data['kelas_siswa'];
                        $sql = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$kelas' ");
                        $cek = mysqli_fetch_assoc($sql);
                    } elseif ($waktu == "Saturday" || "Sunday") {
                        error_reporting(0);
                    }

                    ?>

                    <div class="card-body">
                        <ul class="">
                            <li>
                                <?php
                                $kode = $cek['pelajaran1'];
                                $sql_mapel = mysqli_query($conn, "SELECT * FROM list_pelajaran WHERE kode_pelajaran = '$kode' ");
                                $mapel = mysqli_fetch_assoc($sql_mapel);
                                echo $mapel['mata_pelajaran'];
                                ?>
                            </li>
                            <li>
                                <?php
                                $kode = $cek['pelajaran2'];
                                $sql_mapel = mysqli_query($conn, "SELECT * FROM list_pelajaran WHERE kode_pelajaran = '$kode' ");
                                $mapel = mysqli_fetch_assoc($sql_mapel);
                                echo $mapel['mata_pelajaran'];
                                ?>
                            </li>
                            <li>
                                <?php
                                $kode = $cek['pelajaran3'];
                                $sql_mapel = mysqli_query($conn, "SELECT * FROM list_pelajaran WHERE kode_pelajaran = '$kode' ");
                                $mapel = mysqli_fetch_assoc($sql_mapel);
                                echo $mapel['mata_pelajaran'];
                                ?>
                            </li>
                            <li>
                                <?php
                                $kode = $cek['pelajaran4'];
                                $sql_mapel = mysqli_query($conn, "SELECT * FROM list_pelajaran WHERE kode_pelajaran = '$kode' ");
                                $mapel = mysqli_fetch_assoc($sql_mapel);
                                echo $mapel['mata_pelajaran'];
                                ?>
                            </li>
                            <li>
                                <?php
                                $kode = $cek['pelajaran5'];
                                $sql_mapel = mysqli_query($conn, "SELECT * FROM list_pelajaran WHERE kode_pelajaran = '$kode' ");
                                $mapel = mysqli_fetch_assoc($sql_mapel);
                                echo $mapel['mata_pelajaran'];
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pt-4">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
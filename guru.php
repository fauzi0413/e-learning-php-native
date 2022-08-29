<?php
session_start();

require './koneksi.php';

if (!isset($_SESSION['guru'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['guru'];
    $judul = 'Dashboard';
}

$sql = mysqli_query($conn, "SELECT * FROM data_guru WHERE username = '$username' ");
$data = mysqli_fetch_assoc($sql);


date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Learning | <?= $judul ?></title>

    <!-- Logo -->
    <link rel="icon" href="./">

    <!-- Custom fonts for this template-->
    <link href="./layout/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./layout/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">E-Learning</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="./guru.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Data
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="./guru/materi.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data Materi</span>
                </a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="./guru/tugas.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Data Tugas</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-link">
                                <!-- <span class="mr-2 d-none d-inline text-gray-600"> <?= $data['kelas_siswa'] ?> </span> -->
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-inline text-gray-600"> <?= $data['nama_guru'] ?> </span>
                                <img class="img-profile rounded-circle" src="./layout/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./guru/profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="min-height: 450px;">
                    <div class="row">
                        <div class="col-md-12 col-lg-9">
                            <!-- Page Heading -->
                            <div class="row">
                                <div class="d-sm-flex col-6">
                                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                                </div>
                                <div class="col-6 text-right mt-2">
                                    <span class="">Today : <?= date('l, j F Y') ?></span>
                                </div>
                            </div>

                            <hr>

                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <span class="h4">Materi hari ini</span>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            // CEK TANGGAL HARI INI
                                            $tanggal = date('Y-m-d');
                                            ?>

                                            <div class="content">
                                                <h5><?= $data['mata_pelajaran1'] ?></h5>
                                                <hr>
                                                <!-- CEK APAKAH ADA PELAJARAN HARI INI ATAU TIDAK -->
                                                <?php
                                                $sql_materi = mysqli_query($conn, "SELECT * FROM materi WHERE nama_penulis = '$username' AND tanggal_unggah = '$tanggal' AND pelajaran = '$data[mata_pelajaran1]' ");
                                                while ($data_materi = mysqli_fetch_assoc($sql_materi)) {

                                                    if ($data_materi['pelajaran'] == $data['mata_pelajaran1']) {
                                                        if ($data_materi['tanggal_unggah'] == $tanggal) {
                                                ?>

                                                            <a href="./guru/view.php?cek=materi&id=<?= $data_materi['id'] ?>" class="btn btn-light w-100 mb-3" style="border-radius: 10px;">
                                                                <span class="float-left"><?= $data_materi['judul_materi'] ?></span>
                                                            </a>

                                                <?php

                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>

                                            <div class="content">
                                                <h5><?= $data['mata_pelajaran2'] ?></h5>
                                                <hr>
                                                <!-- CEK APAKAH ADA PELAJARAN HARI INI ATAU TIDAK -->
                                                <?php
                                                $sql_materi = mysqli_query($conn, "SELECT * FROM materi WHERE nama_penulis = '$username' AND tanggal_unggah = '$tanggal' AND pelajaran = '$data[mata_pelajaran2]' ");
                                                while ($data_materi = mysqli_fetch_assoc($sql_materi)) {

                                                    if ($data_materi['pelajaran'] == $data['mata_pelajaran2']) {
                                                        if ($data_materi['tanggal_unggah'] == $tanggal) {
                                                ?>

                                                            <a href="./guru/view.php?cek=materi&id=<?= $data_materi['id'] ?>" class="btn btn-light w-100 mb-3" style="border-radius: 10px;">
                                                                <span class="float-left"><?= $data_materi['judul_materi'] ?></span>
                                                            </a>

                                                <?php

                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>

                                            <div class="content">
                                                <h5><?= $data['mata_pelajaran3'] ?></h5>
                                                <hr>
                                                <!-- CEK APAKAH ADA PELAJARAN HARI INI ATAU TIDAK -->
                                                <?php
                                                $sql_materi = mysqli_query($conn, "SELECT * FROM materi WHERE nama_penulis = '$username' AND tanggal_unggah = '$tanggal' AND pelajaran = '$data[mata_pelajaran3]' ");
                                                while ($data_materi = mysqli_fetch_assoc($sql_materi)) {

                                                    if ($data_materi['pelajaran'] == $data['mata_pelajaran3']) {
                                                        if ($data_materi['tanggal_unggah'] == $tanggal) {
                                                ?>

                                                            <a href="./guru/view.php?cek=materi&id=<?= $data_materi['id'] ?>" class="btn btn-light w-100 mb-3" style="border-radius: 10px;">
                                                                <span class="float-left"><?= $data_materi['judul_materi'] ?></span>
                                                            </a>

                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <span class="h4">Tugas hari ini</span>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            // CEK TANGGAL HARI INI
                                            $tanggal = date('Y-m-d');
                                            ?>

                                            <div class="content">
                                                <h5><?= $data['mata_pelajaran1'] ?></h5>
                                                <hr>
                                                <!-- CEK APAKAH ADA PELAJARAN HARI INI ATAU TIDAK -->
                                                <?php
                                                $sql_materi = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$username' AND tanggal_unggah = '$tanggal' AND pelajaran = '$data[mata_pelajaran1]' ");
                                                while ($data_materi = mysqli_fetch_assoc($sql_materi)) {

                                                    if ($data_materi['pelajaran'] == $data['mata_pelajaran1']) {
                                                        if ($data_materi['tanggal_unggah'] == $tanggal) {
                                                ?>

                                                            <a href="./guru/view.php?cek=tugas&id=<?= $data_materi['id'] ?>" class="btn btn-light w-100 mb-3" style="border-radius: 10px;">
                                                                <span class="float-left"><?= $data_materi['judul_tugas'] ?></span>
                                                            </a>

                                                <?php

                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>

                                            <div class="content">
                                                <h5><?= $data['mata_pelajaran2'] ?></h5>
                                                <hr>
                                                <!-- CEK APAKAH ADA PELAJARAN HARI INI ATAU TIDAK -->
                                                <?php
                                                $sql_materi = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$username' AND tanggal_unggah = '$tanggal' AND pelajaran = '$data[mata_pelajaran2]' ");
                                                while ($data_materi = mysqli_fetch_assoc($sql_materi)) {

                                                    if ($data_materi['pelajaran'] == $data['mata_pelajaran2']) {
                                                        if ($data_materi['tanggal_unggah'] == $tanggal) {
                                                ?>

                                                            <a href="./guru/view.php?cek=tugas&id=<?= $data_materi['id'] ?>" class="btn btn-light w-100 mb-3" style="border-radius: 10px;">
                                                                <span class="float-left"><?= $data_materi['judul_tugas'] ?></span>
                                                            </a>

                                                <?php

                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>

                                            <div class="content">
                                                <h5><?= $data['mata_pelajaran3'] ?></h5>
                                                <hr>
                                                <!-- CEK APAKAH ADA PELAJARAN HARI INI ATAU TIDAK -->
                                                <?php
                                                $sql_materi = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$username' AND tanggal_unggah = '$tanggal' AND pelajaran = '$data[mata_pelajaran3]' ");
                                                while ($data_materi = mysqli_fetch_assoc($sql_materi)) {

                                                    if ($data_materi['pelajaran'] == $data['mata_pelajaran3']) {
                                                        if ($data_materi['tanggal_unggah'] == $tanggal) {
                                                ?>

                                                            <a href="./guru/view.php?cek=tugas&id=<?= $data_materi['id'] ?>" class="btn btn-light w-100 mb-3" style="border-radius: 10px;">
                                                                <span class="float-left"><?= $data_materi['judul_tugas'] ?></span>
                                                            </a>

                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 col-lg-3">
                            <div class="row justify-content-center">

                                <!-- CARD MATERI -->
                                <div class="col-md-4 col-lg-12">
                                    <a href="./guru/materi.php" class="nav-link">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                            Jumlah Materi</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?php
                                                            $sqlc = mysqli_query($conn, "SELECT * FROM materi WHERE nama_penulis = '$data[username]' ");
                                                            $c = mysqli_num_rows($sqlc);
                                                            echo $c;
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- CARD TUGAS -->
                                <div class="col-md-4 col-lg-12">
                                    <a href="./guru/tugas.php" class="nav-link">
                                        <div class="card border-left-warning shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                            Jumlah Tugas</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?php
                                                            $sqlc = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$data[username]' ");
                                                            $c = mysqli_num_rows($sqlc);
                                                            echo $c;
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah yakin ingin logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./layout/vendor/jquery/jquery.min.js"></script>
    <script src="./layout/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./layout/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./layout/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./layout/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./layout/js/demo/chart-area-demo.js"></script>
    <script src="./layout/js/demo/chart-pie-demo.js"></script>

</body>

</html>
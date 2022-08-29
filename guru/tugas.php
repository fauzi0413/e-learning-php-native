<?php
session_start();

require '../koneksi.php';

if (!isset($_SESSION['guru'])) {
    header('location:../login.php');
} else {
    $username = $_SESSION['guru'];
    $judul = 'Tugas';
}

$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
$data = mysqli_fetch_assoc($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include '../layout/heading.php';
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include './sidebar.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include 'navbar.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid" style="min-height: 450px;">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <!-- Page Heading -->
                            <div class="row">
                                <div class="d-sm-flex col-6">
                                    <h1 class="h3 mb-0 text-gray-800">Data Tugas</h1>
                                </div>
                                <div class="col-6 text-right mt-2">
                                    <span class="">Today : <?= date('l, j F Y') ?></span>
                                </div>
                            </div>

                            <hr>

                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header row py-3 mx-0">
                                            <span class="h4">Kelola tugas</span>
                                            <a href="./create.php?cek=tugas" class="btn btn-primary ml-auto mr-3"><i class="fas fa-plus"></i> Tambah</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="content">
                                                <?php
                                                // CEK NAMA GURU
                                                $sql_guru = mysqli_query($conn, "SELECT * FROM data_guru WHERE username = '$username' ");
                                                $guru = mysqli_fetch_assoc($sql_guru);
                                                $nama_guru = $guru['username'];
                                                $mata_pelajaran1 = $guru['mata_pelajaran1'];
                                                $mata_pelajaran2 = $guru['mata_pelajaran2'];
                                                $mata_pelajaran3 = $guru['mata_pelajaran3'];

                                                // CEK APAKAH ADA ATAU TIDAK TUGAS YANG DI MILIKI GURU TERSEBUT DI MATA PELAJARAN 1
                                                $sql_tugas1 = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$nama_guru' AND pelajaran = '$mata_pelajaran1' ");
                                                $tugas1 = mysqli_fetch_assoc($sql_tugas1);

                                                // CEK TUGAS PER PELAJARAN

                                                if ($tugas1) {
                                                ?>
                                                    <div class="row">
                                                        <h5 class="ml-3"><?= $tugas1['pelajaran'] ?></h5>
                                                    </div>
                                                    <hr>

                                                    <?php

                                                    // CEK TUGAS
                                                    $tugas = $tugas1['pelajaran'];


                                                    $sql_tugas = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$nama_guru' AND pelajaran = '$tugas' ");
                                                    while ($pelajaran = mysqli_fetch_assoc($sql_tugas)) {
                                                    ?>
                                                        <div class="row justify-content-center ml-0">
                                                            <a href="./view.php?cek=tugas&id=<?= $pelajaran['id'] ?>" class="btn btn-light col-9 mb-3" style="border-radius: 10px;">
                                                                <span class="float-left"><?= $pelajaran['judul_tugas'] ?></span>
                                                            </a>
                                                            <div class="col-3 text-center">
                                                                <a href="" class="btn btn-warning"><i class="fas fa-edit mr-2"></i>Edit</a>
                                                                <a href="./delete.php?cek=tugas&id=<?= $pelajaran['id'] ?>" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                }

                                                // CEK APAKAH ADA ATAU TIDAK TUGAS YANG DI MILIKI GURU TERSEBUT DI MATA PELAJARAN 2
                                                $sql_tugas2 = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$nama_guru' AND pelajaran = '$mata_pelajaran2' ");
                                                $tugas2 = mysqli_fetch_assoc($sql_tugas2);

                                                // CEK TUGAS PER PELAJARAN

                                                if ($tugas2) {
                                                    ?>
                                                    <div class="row pt-5">
                                                        <h5 class="ml-3"><?= $tugas2['pelajaran'] ?></h5>
                                                    </div>
                                                    <hr>

                                                    <?php

                                                    // CEK TUGAS
                                                    $tugas = $tugas2['pelajaran'];


                                                    $sql_tugas = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$nama_guru' AND pelajaran = '$tugas' ");
                                                    while ($pelajaran = mysqli_fetch_assoc($sql_tugas)) {
                                                    ?>
                                                        <div class="row justify-content-center ml-0">
                                                            <a href="./view.php?cek=tugas&id=<?= $pelajaran['id'] ?>" class="btn btn-light col-9 mb-3" style="border-radius: 10px;">
                                                                <span class="float-left"><?= $pelajaran['judul_tugas'] ?></span>
                                                            </a>
                                                            <div class="col-3 text-center">
                                                                <a href="./edit.php?cek=tugas&id=<?= $pelajaran['id'] ?>" class="btn btn-warning"><i class="fas fa-edit mr-2"></i>Edit</a>
                                                                <a href="./delete.php?cek=tugas&id=<?= $pelajaran['id'] ?>" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                }

                                                // CEK APAKAH ADA ATAU TIDAK MATERI YANG DI MILIKI GURU TERSEBUT DI MATA PELAJARAN 3
                                                $sql_tugas3 = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$nama_guru' AND pelajaran = '$mata_pelajaran3' ");
                                                $tugas3 = mysqli_fetch_assoc($sql_tugas3);

                                                // CEK TUGAS PER PELAJARAN

                                                if ($tugas3) {
                                                    ?>
                                                    <div class="row pt-5">
                                                        <h5 class="ml-3"><?= $tugas3['pelajaran'] ?></h5>
                                                    </div>
                                                    <hr>

                                                    <?php

                                                    // CEK TUGAS
                                                    $tugas = $tugas3['pelajaran'];


                                                    $sql_tugas = mysqli_query($conn, "SELECT * FROM tugas WHERE nama_penulis = '$nama_guru' AND pelajaran = '$tugas' ");
                                                    while ($pelajaran = mysqli_fetch_assoc($sql_tugas)) {
                                                    ?>
                                                        <div class="row justify-content-center ml-0">
                                                            <a href="./view.php?cek=tugas&id=<?= $pelajaran['id'] ?>" class="btn btn-light col-9 mb-3" style="border-radius: 10px;">
                                                                <span class="float-left"><?= $pelajaran['judul_tugas'] ?></span>
                                                            </a>
                                                            <div class="col-3 text-center">
                                                                <a href="" class="btn btn-warning"><i class="fas fa-edit mr-2"></i>Edit</a>
                                                                <a href="./delete.php?cek=tugas&id=<?= $pelajaran['id'] ?>" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }

                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../layout/js.php';
    ?>

</body>

</html>
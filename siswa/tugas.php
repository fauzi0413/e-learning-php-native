<?php
session_start();

require '../koneksi.php';

if (!isset($_SESSION['user'])) {
    header('location:../login.php');
} else {
    $username = $_SESSION['user'];
    $judul = 'Tugas';
}

$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
$data = mysqli_fetch_assoc($sql);

// CEK DATA SISWA
$sql_siswa = mysqli_query($conn, "SELECT * FROM data_siswa WHERE username = '$username' ");
$siswa = mysqli_fetch_assoc($sql_siswa);

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
                                            <span class="h4">Kumpulan tugas</span>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            ?>

                                            <div class="content">
                                                <?php
                                                $sql_materi = mysqli_query($conn, "SELECT * FROM tugas WHERE kelas = '$siswa[kelas_siswa]' ORDER BY tanggal_unggah DESC ");
                                                while ($data_materi = mysqli_fetch_assoc($sql_materi)) {
                                                ?>

                                                    <a href="./view.php?cek=tugas&id=<?= $data_materi['id'] ?>" class="btn btn-light w-100 mb-3" style="border-radius: 10px;">
                                                        <div class="float-left">
                                                            <span class=""><?= $data_materi['judul_tugas'] ?></span>
                                                            <span>||</span>
                                                            <span><?= $data_materi['pelajaran'] ?></span>
                                                            <span>||</span>
                                                            <span>
                                                                <?php
                                                                $data_tanggal = $data_materi['tanggal_unggah'];
                                                                $tanggal = explode("-", $data_tanggal);
                                                                $tahun = $tanggal[0];
                                                                $bulan = $tanggal[1];
                                                                $tanggal = $tanggal[2];

                                                                $tanggal_new = $tanggal . "/" . $bulan . "/" . $tahun;
                                                                echo $tanggal_new;
                                                                ?>
                                                            </span>
                                                        </div>
                                                    </a>

                                                <?php
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
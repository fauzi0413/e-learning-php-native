<?php
session_start();

require '../koneksi.php';

if (!isset($_SESSION['guru'])) {
    header('location:../login.php');
} else {
    $username = $_SESSION['guru'];
    $judul = 'View';
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

    <!-- CDN CKEDITOR -->
    <script src="//cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>

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
                include './navbar.php';

                $cek = $_GET['cek'];
                if ($cek == 'materi') {
                    $cek = "materi";
                } elseif ($cek == 'tugas') {
                    $cek = "tugas";
                }

                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid" style="min-height: 450px;">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <!-- Page Heading -->
                            <div class="row">
                                <div class="d-sm-flex col-6">
                                    <?php
                                    if ($cek == 'materi') {
                                    ?>
                                        <a href="./materi.php" class="btn btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i> Kembali</a>
                                    <?php
                                    } elseif ($cek == 'tugas') {
                                    ?>
                                        <a href="./tugas.php" class="btn btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i> Kembali</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-6 text-right mt-2">
                                    <span class="">Today : <?= date('l, j F Y') ?></span>
                                </div>
                            </div>

                            <hr>

                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="content p-3" style="min-height: 300px;">
                                                <?php
                                                if ($cek == 'materi') {
                                                    $id = $_GET['id'];
                                                    $sql = mysqli_query($conn, "SELECT * FROM materi WHERE id = '$id' ");
                                                    $data = mysqli_fetch_assoc($sql);

                                                    // UBAH TANGGAL
                                                    $tanggal_unggah = $data['tanggal_unggah'];

                                                    // PISAH TANGGAL
                                                    $data_tanggal = explode("-", $tanggal_unggah);
                                                    $tahun = $data_tanggal[0];
                                                    $bulan = $data_tanggal[1];
                                                    $tanggal = $data_tanggal[2];

                                                    $tanggal = $tanggal . "/" . $bulan . "/" . $tahun;
                                                ?>
                                                    <span class="h4" style="font-weight: bold;"><?= $data['judul_materi'] ?> - <?= $data['pelajaran'] ?></span>
                                                    <br>
                                                    <span class="h6"><?= $data['nama_penulis'] ?> - <?= $tanggal ?></span>
                                                    <hr>
                                                    <span><?= $data['deskripsi'] ?></span>
                                                    <hr class="pb-3">
                                                    <span>File tambahan pada <?= $cek ?> kali ini.</span>
                                                    <div class="card-light bg-light rounded-3 mt-3 p-3">
                                                        <?= $data['file'] ?>
                                                        <a href="./download.php?file=<?= $view['file'] ?>" class="btn btn-sm btn-primary mx-3">Download</a>
                                                    </div>
                                                <?php
                                                } elseif ($cek == 'tugas') {
                                                    $id = $_GET['id'];
                                                    $sql = mysqli_query($conn, "SELECT * FROM tugas WHERE id = '$id' ");
                                                    $data = mysqli_fetch_assoc($sql);

                                                    // UBAH TANGGAL
                                                    $tanggal_unggah = $data['tanggal_unggah'];

                                                    // PISAH TANGGAL
                                                    $data_tanggal = explode("-", $tanggal_unggah);
                                                    $tahun = $data_tanggal[0];
                                                    $bulan = $data_tanggal[1];
                                                    $tanggal = $data_tanggal[2];

                                                    $tanggal = $tanggal . "/" . $bulan . "/" . $tahun;
                                                ?>
                                                    <span class="h4" style="font-weight: bold;"><?= $data['judul_tugas'] ?> - <?= $data['pelajaran'] ?></span>
                                                    <br>
                                                    <span class="h6"><?= $data['nama_penulis'] ?> - <?= $tanggal ?></span>
                                                    <hr>
                                                    <span><?= $data['deskripsi'] ?></span>
                                                    <hr class="pb-3">
                                                    <span>File tambahan pada <?= $cek ?> kali ini.</span>
                                                    <div class="card-light bg-light rounded-3 mt-3 p-3">
                                                        <?= $data['file'] ?>
                                                        <a href="./download.php?file=<?= $view['file'] ?>" class="btn btn-sm btn-primary mx-3">Download</a>
                                                    </div>
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
                <!-- End Page Content -->

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
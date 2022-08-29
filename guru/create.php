<?php
session_start();

require '../koneksi.php';

if (!isset($_SESSION['guru'])) {
    header('location:../login.php');
} else {
    $username = $_SESSION['guru'];
    $judul = 'Tambah Data';
}

$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
$data = mysqli_fetch_assoc($sql);

require '../function.php';

if (isset($_POST['data_materi'])) {
    if (data_materi($_POST) > 0) {
        $_SESSION['guru'] = $data['username'];
        header("location: materi.php");
    }
} elseif (isset($_POST['data_tugas'])) {
    if (data_tugas($_POST) > 0) {
        $_SESSION['guru'] = $data['username'];
        header("location: tugas.php");
    }
}

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
                $username = $_SESSION['guru'];
                include './navbar.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid" style="min-height: 450px;">

                    <?php

                    $cek = $_GET['cek'];
                    if ($cek == 'materi') {
                        $cek = "materi";
                    } elseif ($cek == 'tugas') {
                        $cek = "tugas";
                    }

                    ?>

                    <h1 class="h3 mb-4 text-gray-800 text-center">Tambah data <?= $cek ?></h1>

                    <!-- DataTales Example -->
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="" enctype="multipart/form-data">

                                        <?php
                                        $cek = $_GET['cek'];
                                        if ($cek == 'materi') {
                                            // $nama = $_GET['user'];

                                            // $sql_materi = mysqli_query($conn, "SELECT * FROM data_guru WHERE username = '$nama' ");
                                            // $data_materi = mysqli_fetch_assoc($sql_materi);
                                        ?>
                                            <a href="./materi.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="nama_penulis" class="form-label">Nama Penulis</label>
                                                <input type="text" class="form-control" name="nama_penulis" id="nama_penulis" value="<?= $username ?>" readonly>
                                            </div>

                                            <div class="mb-4">
                                                <label for="kelas" class="form-label">Pilih Kelas <span class="text-danger">*</span></label>
                                                <select name="kelas" id="kelas" class="form-control" required>
                                                    <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                                                    while ($mapel = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                        <option value="<?= $mapel['nama_kelas'] ?>"><?= $mapel['nama_kelas'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="pelajaran" class="form-label">Pilih Pelajaran <span class="text-danger">*</span></label>
                                                <select name="pelajaran" id="pelajaran" class="form-control" required>
                                                    <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM data_guru WHERE username = '$username' ");
                                                    $mapel = mysqli_fetch_assoc($sql)
                                                    ?>
                                                    <option value="<?= $mapel['mata_pelajaran1'] ?>"><?= $mapel['mata_pelajaran1'] ?></option>
                                                    <option value="<?= $mapel['mata_pelajaran2'] ?>"><?= $mapel['mata_pelajaran2'] ?></option>
                                                    <option value="<?= $mapel['mata_pelajaran3'] ?>"><?= $mapel['mata_pelajaran3'] ?></option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="judul" class="form-label">Judul Materi <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="judul" id="judul" maxlength="50" placeholder="Masukkan Judul Materi" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="tanggal" class="form-label">Tanggal Unggah Materi <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Materi" id="deskripsi" required></textarea>
                                            </div>
                                            <script>
                                                CKEDITOR.replace('deskripsi');
                                            </script>

                                            <div class="mb-4">
                                                <label for="file" class="form-label">Upload File <span>(Optional)</span></label>
                                                <input type="file" class="form-control" name="file" id="file">
                                            </div>

                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="data_materi" value="Tambah">
                                            </div>

                                        <?php
                                        } elseif ($cek == 'tugas') {
                                            // $nama = $_GET['user'];

                                            // $sql_materi = mysqli_query($conn, "SELECT * FROM data_guru WHERE username = '$nama' ");
                                            // $data_materi = mysqli_fetch_assoc($sql_materi);
                                        ?>
                                            <a href="./tugas.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="nama_penulis" class="form-label">Nama Penulis</label>
                                                <input type="text" class="form-control" name="nama_penulis" id="nama_penulis" value="<?= $username ?>" readonly>
                                            </div>

                                            <div class="mb-4">
                                                <label for="kelas" class="form-label">Pilih Kelas</label>
                                                <select name="kelas" id="kelas" class="form-control" required>
                                                    <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                                                    while ($mapel = mysqli_fetch_assoc($sql)) {
                                                    ?>
                                                        <option value="<?= $mapel['nama_kelas'] ?>"><?= $mapel['nama_kelas'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="pelajaran" class="form-label">Pilih Pelajaran</label>
                                                <select name="pelajaran" id="pelajaran" class="form-control" required>
                                                    <?php
                                                    $sql = mysqli_query($conn, "SELECT * FROM data_guru WHERE username = '$username' ");
                                                    $mapel = mysqli_fetch_assoc($sql)
                                                    ?>
                                                    <option value="<?= $mapel['mata_pelajaran1'] ?>"><?= $mapel['mata_pelajaran1'] ?></option>
                                                    <option value="<?= $mapel['mata_pelajaran2'] ?>"><?= $mapel['mata_pelajaran2'] ?></option>
                                                    <option value="<?= $mapel['mata_pelajaran3'] ?>"><?= $mapel['mata_pelajaran3'] ?></option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="judul" class="form-label">Judul Tugas</label>
                                                <input type="text" class="form-control" name="judul" id="judul" maxlength="50" placeholder="Masukkan Judul Materi" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="tanggal" class="form-label">Tanggal Unggah Tugas</label>
                                                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Materi" id="deskripsi" required></textarea>
                                            </div>
                                            <script>
                                                CKEDITOR.replace('deskripsi');
                                            </script>

                                            <div class="mb-4">
                                                <label for="file" class="form-label">Upload File</label>
                                                <input type="file" class="form-control" name="file" id="file">
                                            </div>

                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="data_tugas" value="Tambah">
                                            </div>

                                        <?php
                                        }
                                        ?>

                                    </form>
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
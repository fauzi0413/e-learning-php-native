<?php
session_start();

require '../koneksi.php';

if (!isset($_SESSION['user'])) {
    header('location:../login.php');
} else {
    $username = $_SESSION['user'];
    $judul = 'Profile';
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

                    <h1 class="h3 mb-4 text-center text-gray-800" id="judul">Profile</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mx-auto" style="width: 85%;">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger btn-sm disabled" id="btnprofile" onclick="dataprofile()"><i class="fas fa-user-alt mr-2"></i> Profile</a>
                                    <a class="btn btn-success btn-sm" id="btnabsen2" onclick="dataabsen2()"><i class="fas fa-book mr-2"></i> Absen</a>
                                    <a class="btn btn-warning btn-sm" id="btnjadwal2" onclick="datajadwal2()"><i class="fas fa-list mr-2"></i> Jadwal</a>
                                </div>
                            </div>

                            <div class="table-responsive" id="profile">
                                <table class="table table-bordered text-center my-4 w-100" id="dataTable" width="100%" cellspacing="0">
                                    <tbody class="">

                                        <tr class="col">
                                            <th scope="row" class="col-6">Username</th>
                                            <td class="col-6"><?= $data['username'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row">Password</th>
                                            <td class="col-3"><?= $data['password'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row">Level</th>
                                            <td class="col-3"><?= $data['level'] ?></td>
                                        </tr>

                                        <?php
                                        $sql_siswa = mysqli_query($conn, "SELECT * FROM data_siswa WHERE username = '$username' ");
                                        $siswa = mysqli_fetch_assoc($sql_siswa);
                                        ?>

                                        <tr class="col">
                                            <th scope="row">NIS</th>
                                            <td class="col-3"><?= $siswa['nis'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row">Nama Siswa</th>
                                            <td class="col-3"><?= $siswa['nama_siswa'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row">Kelas Siswa</th>
                                            <td class="col-3"><?= $siswa['kelas_siswa'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row">Kelamin</th>
                                            <td class="col-3">
                                                <?php
                                                $cek = $siswa['kelamin'];
                                                if ($cek == 'L') {
                                                    $kelamin = 'Laki-Laki';
                                                } elseif ($cek == 'P') {
                                                    $kelamin = 'Perempuan';
                                                }
                                                echo $kelamin;
                                                ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive" id="absen" style="display: none;">
                                <table class="table table-bordered text-center my-4 w-100" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="col-1">No</th>
                                            <th class="col-3">NIS</th>
                                            <th class="col-8">Nama Siswa</thc>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php
                                        $kelas = $siswa['kelas_siswa'];

                                        $sql = mysqli_query($conn, "SELECT * FROM data_siswa WHERE kelas_siswa = '$kelas' ORDER BY nis ASC");
                                        $no = 1;
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['nis'] ?></td>
                                                <td><?= $data['nama_siswa'] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive" id="jadwal" style="display: none;">

                                <!-- TABEL HARI SENIN -->
                                <table class="table table-bordered text-center mb-4 mt-2 w-100" id="dataTable" width="100%" cellspacing="0">
                                    <h3 class="mt-4 mb-0">Senin</h3>
                                    <thead>
                                        <tr>
                                            <th class="col-1">No</th>
                                            <th class="">Mata Pelajaran</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php
                                        $kelas = $siswa['kelas_siswa'];
                                        $no = 1;

                                        $sql = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$kelas' ");
                                        $data = mysqli_fetch_assoc($sql)
                                        ?>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran1'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran2'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran3'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran4'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran5'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <!-- TABEL HARI SELASA -->
                                <table class="table table-bordered text-center mb-4 mt-2 w-100" id="dataTable" width="100%" cellspacing="0">
                                    <h3 class="mt-4 mb-0">Selasa</h3>
                                    <thead>
                                        <tr>
                                            <th class="col-1">No</th>
                                            <th class="">Mata Pelajaran</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php
                                        $kelas = $siswa['kelas_siswa'];
                                        $no = 1;

                                        $sql = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$kelas' ");
                                        $data = mysqli_fetch_assoc($sql)
                                        ?>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran1'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran2'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran3'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran4'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran5'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <!-- TABEL HARI RABU -->
                                <table class="table table-bordered text-center mb-4 mt-2 w-100" id="dataTable" width="100%" cellspacing="0">
                                    <h3 class="mt-4 mb-0">Rabu</h3>
                                    <thead>
                                        <tr>
                                            <th class="col-1">No</th>
                                            <th class="">Mata Pelajaran</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php
                                        $kelas = $siswa['kelas_siswa'];
                                        $no = 1;

                                        $sql = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$kelas' ");
                                        $data = mysqli_fetch_assoc($sql)
                                        ?>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran1'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran2'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran3'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran4'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran5'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <!-- TABEL HARI KAMIS -->
                                <table class="table table-bordered text-center mb-4 mt-2 w-100" id="dataTable" width="100%" cellspacing="0">
                                    <h3 class="mt-4 mb-0">Kamis</h3>
                                    <thead>
                                        <tr>
                                            <th class="col-1">No</th>
                                            <th class="">Mata Pelajaran</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php
                                        $kelas = $siswa['kelas_siswa'];
                                        $no = 1;

                                        $sql = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$kelas' ");
                                        $data = mysqli_fetch_assoc($sql)
                                        ?>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran1'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran2'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran3'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran4'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran5'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <!-- TABEL HARI JUMAT -->
                                <table class="table table-bordered text-center mb-4 mt-2 w-100" id="dataTable" width="100%" cellspacing="0">
                                    <h3 class="mt-4 mb-0">Jumat</h3>
                                    <thead>
                                        <tr>
                                            <th class="col-1">No</th>
                                            <th class="">Mata Pelajaran</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <?php
                                        $kelas = $siswa['kelas_siswa'];
                                        $no = 1;

                                        $sql = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$kelas' ");
                                        $data = mysqli_fetch_assoc($sql)
                                        ?>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran1'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran2'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran3'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran4'] ?></td>
                                        </tr>

                                        <tr class="col">
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data['pelajaran5'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>

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
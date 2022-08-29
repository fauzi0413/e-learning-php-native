<?php
session_start();

require '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['admin'];
    $judul = 'Detail';
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
                    <?php
                    $cek = $_GET['detail'];
                    if ($cek == 'guru') {
                        $cek = 'guru';
                        $username = $_GET['nama'];
                    } elseif ($cek == 'kelas') {
                        $cek = 'kelas';
                        $judul = $_GET['nama'];
                    }
                    ?>

                    <h1 class="h3 mb-4 text-center text-gray-800">Detail <?= $cek ?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mx-auto" style="width: 85%;">
                        <div class="card-header py-3">
                            <?php
                            if ($cek == 'guru') {
                                $sql = mysqli_query($conn, "SELECT * FROM data_guru WHERE username = '$username' ");
                                $guru = mysqli_fetch_assoc($sql);
                                $judul = $guru['nama_guru'];
                            }
                            ?>
                            <h3 class="text-center"><?= $judul ?></h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($cek == 'guru') {
                            ?>

                                <a href="./data-guru.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>

                                <div class="table-responsive">
                                    <table class="table table-bordered text-center my-4 w-100" id="dataTable" width="100%" cellspacing="0">
                                        <tbody class="">

                                            <tr class="col">
                                                <th scope="row" class="col-6">Username</th>
                                                <td class="col-6"><?= $guru['username'] ?></td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row" class="col-6">Password</th>
                                                <td class="col-6"><?= $data['password'] ?></td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row">NIK</th>
                                                <td class="col-3"><?= $guru['nik'] ?></td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row">Mata Pelajaran</th>
                                                <td class="col-3 text-left">
                                                    <ol type="1">
                                                        <li><?= $guru['mata_pelajaran1'] ?></li>
                                                        <li><?= $guru['mata_pelajaran2'] ?></li>
                                                        <li><?= $guru['mata_pelajaran3'] ?></li>
                                                    </ol>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            } elseif ($cek == 'kelas') {
                            ?>
                                <div class="row">
                                    <div class="col-6">
                                        <a href="./data-kelas.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                    </div>

                                    <div class="col-6 text-right">
                                        <a class="btn btn-success btn-sm disabled" id="btnabsen" onclick="dataabsen()"><i class="fas fa-book mr-2"></i> Absen</a>
                                        <a class="btn btn-warning btn-sm" id="btnjadwal" onclick="datajadwal()"><i class="fas fa-list mr-2"></i> Jadwal</a>
                                    </div>
                                </div>

                                <hr>

                                <div class="table-responsive" id="absen">
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
                                            $kelas = $_GET['nama'];

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
                                    <a href="./create.php?cek=mapel&kelas=<?= $judul ?>" class="btn btn-primary btn-sm mr-2"><i class="fas fa-plus mr-2"></i> Tambah</a>

                                    <!-- TABEL HARI SENIN -->
                                    <table class="table table-bordered text-center mb-4 mt-2 w-100" id="dataTable" width="100%" cellspacing="0">
                                        <h3 class="mt-4 mb-0">Senin</h3>
                                        <thead>
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="">Mata Pelajaran</thc>
                                                <th class="col-3">Option</thc>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <?php
                                            $kelas = $_GET['nama'];
                                            $no = 1;

                                            $sql = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$kelas' ");
                                            $data = mysqli_fetch_assoc($sql)
                                            ?>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran1'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Senin&jadwal=1" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?cek=mapel&hari=senin&jadwal=1&nama_kelas=<?= $data['nama_kelas'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran2'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Senin&jadwal=2" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?cek=mapel&hari=senin&jadwal=2&nama_kelas=<?= $data['nama_kelas'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran3'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Senin&jadwal=3" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?cek=mapel&hari=senin&jadwal=3&nama_kelas=<?= $data['nama_kelas'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran4'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Senin&jadwal=4" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?cek=mapel&hari=senin&jadwal=4&nama_kelas=<?= $data['nama_kelas'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran5'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Senin&jadwal=5" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?cek=mapel&hari=senin&jadwal=5&nama_kelas=<?= $data['nama_kelas'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <!-- TABEL HARI SELASA -->
                                    <table class="table table-bordered text-center mb-4 mt-2 w-100" id="dataTable" width="100%" cellspacing="0">
                                        <h3 class="mt-4 mb-0">Selasa</h3>
                                        <thead>
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="">Mata Pelajaran</thc>
                                                <th class="col-3">Option</thc>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <?php
                                            $kelas = $_GET['nama'];
                                            $no = 1;

                                            $sql = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$kelas' ");
                                            $data = mysqli_fetch_assoc($sql)
                                            ?>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran1'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Selasa&jadwal=1" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?cek=mapel&hari=selasa&jadwal=1&nama_kelas=<?= $data['nama_kelas'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran2'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Selasa&jadwal=2" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?cek=mapel&hari=selasa&jadwal=2&nama_kelas=<?= $data['nama_kelas'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran3'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Selasa&jadwal=3" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?cek=mapel&hari=selasa&jadwal=3&nama_kelas=<?= $data['nama_kelas'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran4'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Selasa&jadwal=4" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?cek=mapel&hari=selasa&jadwal=4&nama_kelas=<?= $data['nama_kelas'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran5'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Selasa&jadwal=5" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?cek=mapel&hari=selasa&jadwal=5&nama_kelas=<?= $data['nama_kelas'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <!-- TABEL HARI RABU -->
                                    <table class="table table-bordered text-center mb-4 mt-2 w-100" id="dataTable" width="100%" cellspacing="0">
                                        <h3 class="mt-4 mb-0">Rabu</h3>
                                        <thead>
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="">Mata Pelajaran</thc>
                                                <th class="col-3">Option</thc>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <?php
                                            $kelas = $_GET['nama'];
                                            $no = 1;

                                            $sql = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$kelas' ");
                                            $data = mysqli_fetch_assoc($sql)
                                            ?>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran1'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Rabu&jadwal=1" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran2'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Rabu&jadwal=2" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran3'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Rabu&jadwal=3" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran4'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Rabu&jadwal=4" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran5'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Rabu&jadwal=5" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <!-- TABEL HARI KAMIS -->
                                    <table class="table table-bordered text-center mb-4 mt-2 w-100" id="dataTable" width="100%" cellspacing="0">
                                        <h3 class="mt-4 mb-0">Kamis</h3>
                                        <thead>
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="">Mata Pelajaran</thc>
                                                <th class="col-3">Option</thc>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <?php
                                            $kelas = $_GET['nama'];
                                            $no = 1;

                                            $sql = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$kelas' ");
                                            $data = mysqli_fetch_assoc($sql)
                                            ?>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran1'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Kamis&jadwal=1" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran2'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Kamis&jadwal=2" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran3'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Kamis&jadwal=3" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran4'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Kamis&jadwal=4" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran5'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Kamis&jadwal=5" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <!-- TABEL HARI JUMAT -->
                                    <table class="table table-bordered text-center mb-4 mt-2 w-100" id="dataTable" width="100%" cellspacing="0">
                                        <h3 class="mt-4 mb-0">Jumat</h3>
                                        <thead>
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="">Mata Pelajaran</thc>
                                                <th class="col-3">Option</thc>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <?php
                                            $kelas = $_GET['nama'];
                                            $no = 1;

                                            $sql = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$kelas' ");
                                            $data = mysqli_fetch_assoc($sql)
                                            ?>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran1'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Jumat&jadwal=1" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran2'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Jumat&jadwal=2" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran3'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Jumat&jadwal=3" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran4'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Jumat&jadwal=4" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <tr class="col">
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data['pelajaran5'] ?></td>
                                                <td>
                                                    <a href="./edit.php?cek=mapel&kelas=<?= $data['nama_kelas'] ?>&hari=Jumat&jadwal=5" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>

                            <?php
                            }
                            ?>
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
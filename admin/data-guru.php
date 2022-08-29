<?php
session_start();

require '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['admin'];
    $judul = 'Data guru';
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

                    <h1 class="h3 mb-4 text-gray-800">Data guru</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="./create.php?cek=guru" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="">
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>NIK</th>
                                            <th class="col-3">Nama Guru</th>
                                            <!-- <th>Mata Pelajaran</th> -->
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="">
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>NIK</th>
                                            <th class="col-3">Nama Guru</th>
                                            <!-- <th>Mata Pelajaran</th> -->
                                            <th>Option</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="">
                                        <?php
                                        $no = 0;

                                        $sql = mysqli_query($conn, "SELECT * FROM data_guru ORDER BY nik ASC");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            $no++;
                                        ?>
                                            <tr class="col">
                                                <th scope="row" class="text-center"><?= $no ?></th>
                                                <td><?= $data['username'] ?></td>
                                                <td><?= $data['nik'] ?></td>
                                                <td><?= $data['nama_guru'] ?></td>
                                                <!-- <td class="col-3 text-left">
                                                    <a href="#" class="btn btn-info"><i class="fas fa-search"></i> Detail</a>
                                                </td> -->
                                                <td>
                                                    <a href="./detail.php?detail=guru&nama=<?= $data['username'] ?>" class="btn btn-info"><i class="fas fa-search"></i> Detail</a>
                                                    <a href="./edit.php?cek=guru&username=<?= $data['username'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="./delete.php?username=<?= $data['username'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
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
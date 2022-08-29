<?php
session_start();

require '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['admin'];
    $level = $_SESSION['level'];
    $judul = 'Tambah data';
}

$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
$data = mysqli_fetch_assoc($sql);


require '../function.php';

if (isset($_POST['data_user'])) {

    if (data_user($_POST) > 0) {
        $_SESSION['user'] = $data['username'];
        header("location: data-user.php");
    }
} elseif (isset($_POST['data_siswa'])) {

    if (daftarSiswa($_POST) > 0) {
        $_SESSION['user'] = $data['username'];
        header("location: data-siswa.php");
    }
} elseif (isset($_POST['data_guru'])) {

    if (data_guru($_POST) > 0) {
        $_SESSION['user'] = $data['username'];
        header("location: data-guru.php");
    }
} elseif (isset($_POST['tambah_mapel'])) {

    if (tambah_mapel($_POST) > 0) {
        $_SESSION['user'] = $data['username'];
        // header("location: data-kelas.php");
        $kelas = $_GET['kelas'];
        header("location: detail.php?detail=kelas&nama=$kelas ");
    }
} elseif (isset($_POST['tambah_kelas'])) {

    if (tambah_kelas($_POST) > 0) {
        $_SESSION['user'] = $data['username'];
        header("location: data-kelas.php");
    }
}

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
                include './navbar.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid" style="min-height: 450px;">

                    <?php

                    $cek = $_GET['cek'];
                    if ($cek == 'user') {
                        $cek = "user";
                    } elseif ($cek == 'siswa') {
                        $cek = "siswa";
                    } elseif ($cek == 'guru') {
                        $cek = "guru";
                    } elseif ($cek == 'kelas') {
                        $cek = "kelas";
                    } elseif ($cek == 'mapel') {
                        $cek = "mapel";
                    } elseif ($cek == 'cek_mapel') {
                        $cek = "mapel";
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
                                    <form action="" method="post" class="">

                                        <?php
                                        $cek = $_GET['cek'];
                                        if ($cek == 'user') {
                                        ?>
                                            <a href="./data-user.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="level" class="form-label">Level <span class="text-danger">*</span></label>
                                                <select name="level" id="nama_siswa" class="form-control" required>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Siswa">Siswa</option>
                                                    <option value="Guru">Guru</option>
                                                </select>
                                            </div>

                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="data_user" value="Simpan">
                                            </div>

                                        <?php
                                        } elseif ($cek == 'kelas') {
                                        ?>
                                            <a href="./data-kelas.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                                <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Masukkan nama kelas" required>
                                            </div>
                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="tambah_kelas" value="Tambah">
                                            </div>

                                        <?php
                                        } elseif ($cek == 'guru') {
                                        ?>
                                            <a href="./data-guru.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="username" id="username2" placeholder="Masukkan Username Siswa" required>

                                                <!-- <select name="username" id="username" class="form-control">
                                                    <?php

                                                    $join = mysqli_query($conn, "SELECT * FROM user JOIN data_guru ON user.username = data_guru.username WHERE user.level = 'Guru' AND data_guru.username = 0 ORDER BY user.username ASC ");

                                                    $sql = mysqli_fetch_assoc($join);
                                                    $cek = $sql['username'];

                                                    $cek_data = mysqli_query($conn, "SELECT * FROM user WHERE username != '$cek' AND level = 'Guru' ORDER BY username ASC ");

                                                    while ($data = mysqli_fetch_assoc($cek_data)) {
                                                    ?>
                                                        <option value="<?= $data['username'] ?>"><?= $data['username'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select> -->
                                            </div>

                                            <div class="mb-4">
                                                <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK Guru" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="nama_guru" class="form-label">Nama Guru <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Masukkan Nama Guru" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="mata_pelajaran1" class="form-label">Mata Pelajaran Ke-1<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="mata_pelajaran1" id="mata_pelajaran1" placeholder="Masukkan nama mata pelajaran" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="mata_pelajaran2" class="form-label">Mata Pelajaran Ke-2 <span>(Opsional)</span></label>
                                                <input type="text" class="form-control" name="mata_pelajaran2" id="mata_pelajaran2" placeholder="Masukkan nama mata pelajaran">
                                            </div>
                                            <div class="mb-4">
                                                <label for="mata_pelajaran3" class="form-label">Mata Pelajaran Ke-3 <span>(Opsional)</span></label>
                                                <input type="text" class="form-control" name="mata_pelajaran3" id="mata_pelajaran3" placeholder="Masukkan nama mata pelajaran">
                                            </div>
                                            <div class="mb-4">
                                                <label for="kelamin" class="form-label">Kelamin <span class="text-danger">*</span></label>
                                                <div class="row px-3">
                                                    <div class="form-check mr-3">
                                                        <input type="radio" name="kelamin" value="L" id="lk" class="form-check-input" checked>
                                                        <label class="form-check-label" for="lk">Laki-Laki</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="kelamin" value="P" id="p" class="form-check-input">
                                                        <label class="form-check-label" for="p">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="data_guru" value="Tambah">
                                            </div>

                                        <?php
                                        } elseif ($cek == 'siswa') {
                                        ?>
                                            <a href="./data-siswa.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="username" id="username2" placeholder="Masukkan Username Siswa" required>

                                                <!-- <select name="username" id="username" class="form-control">
                                                    <?php

                                                    // $sql_join = mysqli_query($conn, "SELECT * FROM user JOIN data_siswa ON user.username = data_siswa.username WHERE user.level = 'Siswa' AND data_siswa.username = 0 ORDER BY user.username ASC");

                                                    $join = mysqli_query($conn, "SELECT * FROM user JOIN data_siswa ON user.username = data_siswa.username WHERE user.level = 'Siswa' AND data_siswa.username = user.username ORDER BY user.username ASC");

                                                    while ($sql = mysqli_fetch_assoc($join)) {
                                                        // $cek = $sql['username'];

                                                        // $cek_data = mysqli_query($conn, "SELECT * FROM user WHERE username != '$sql[username]' AND level = 'Siswa' ORDER BY username ASC");

                                                        // while ($data = mysqli_fetch_assoc($cek_data)) {
                                                    ?>
                                                        <option value="<?= $sql['username'] ?>"><?= $sql['username'] ?></option>
                                                    <?php
                                                        // }
                                                    }
                                                    ?>
                                                </select> -->
                                            </div>

                                            <div class="mb-4">
                                                <label for="nis" class="form-label">Nomor Induk Siswa <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="nis" id="nis" placeholder="Contoh : 192010007" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="nama_siswa" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Contoh : Fauzi Aditya Pratama" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="nama_siswa" class="form-label">Pilih Kelas <span class="text-danger">*</span></label>
                                                <select name="kelas_siswa" id="nama_siswa" class="form-control" required>
                                                    <!-- <option selected hidden>-</option> -->
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                                                    while ($kelas = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?= $kelas['nama_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for="nama_siswa" class="form-label">Kelamin <span class="text-danger">*</span></label>
                                                <div class="row mx-3">
                                                    <div class="form-check mr-3">
                                                        <input type="radio" name="kelamin" value="L" id="lk" class="form-check-input" checked>
                                                        <label class="form-check-label" for="lk">Laki-Laki</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="kelamin" value="P" id="p" class="form-check-input">
                                                        <label class="form-check-label" for="p">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="data_siswa" value="Tambah">
                                            </div>

                                        <?php
                                        } elseif ($cek == 'mapel') {
                                            $kelas = $_GET['kelas'];
                                        ?>

                                            <a href="detail.php?detail=kelas&nama=<?= $kelas ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="kelas" class="form-label">Kelas </label>
                                                <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $kelas ?>" readonly>
                                            </div>

                                            <div class="mb-4">
                                                <label for="hari" class="form-label">Pilih Hari <span class="text-danger">*</span></label>
                                                <select name="hari" id="hari" class="form-control" required>
                                                    <option value="senin">Senin</option>
                                                    <option value="selasa">Selasa</option>
                                                    <option value="rabu">Rabu</option>
                                                    <option value="kamis">Kamis</option>
                                                    <option value="jumat">Jumat</option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="jadwal" class="form-label">Pilih Jadwal Pelajaran <span class="text-danger">*</span></label>
                                                <select name="jadwal" id="jadwal" class="form-control" required>
                                                    <option value="pelajaran1">Pelajaran 1</option>
                                                    <option value="pelajaran2">Pelajaran 2</option>
                                                    <option value="pelajaran3">Pelajaran 3</option>
                                                    <option value="pelajaran4">Pelajaran 4</option>
                                                    <option value="pelajaran5">Pelajaran 5</option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="mata_pelajaran" class="form-label">Pilih Mata Pelajaran <span class="text-danger">*</span></label>
                                                <select name="mata_pelajaran" id="mata_pelajaran" class="form-control" required>

                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM data_guru ");
                                                    while ($kelas = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?= $kelas['mata_pelajaran1'] ?>"><?= $kelas['mata_pelajaran1'] ?></option>

                                                        <!-- MATA PELAJARAN 2 LOOPING -->
                                                        <?php
                                                        if ($kelas['mata_pelajaran2'] != '') {
                                                        ?>
                                                            <option value="<?= $kelas['mata_pelajaran2'] ?>"><?= $kelas['mata_pelajaran2'] ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                        <!-- MATA PELAJARAN 3 LOOPING -->
                                                        <?php
                                                        if ($kelas['mata_pelajaran3'] != '') {
                                                        ?>
                                                            <option value="<?= $kelas['mata_pelajaran3'] ?>"><?= $kelas['mata_pelajaran3'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="tambah_mapel" value="Tambah">
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

        <script src="/style/main.js"></script>

</body>

</html>
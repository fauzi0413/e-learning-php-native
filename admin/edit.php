<?php
session_start();

require '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['admin'];
    $level = $_SESSION['level'];
    $judul = 'Edit data';
}

$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
$data = mysqli_fetch_assoc($sql);


require '../function.php';

if (isset($_POST['edit_user'])) {

    if (edit_user($_POST) > 0) {
        $_SESSION['user'] = $data['username'];
        header("location: data-user.php");
    }
} elseif (isset($_POST['edit_siswa'])) {

    if (edit_siswa($_POST) > 0) {
        $_SESSION['user'] = $data['username'];
        header("location: data-siswa.php");
    }
} elseif (isset($_POST['edit_kelas'])) {

    if (edit_kelas($_POST) > 0) {
        $_SESSION['user'] = $data['username'];
        header("location: data-kelas.php");
    }
} elseif (isset($_POST['edit_guru'])) {

    if (edit_guru($_POST) > 0) {
        $_SESSION['user'] = $data['username'];
        header("location: data-guru.php");
    }
} elseif (isset($_POST['edit_mapel'])) {

    if (edit_mapel($_POST) > 0) {
        $_SESSION['user'] = $data['username'];
        $kelas = $_GET['kelas'];
        header("location: detail.php?detail=kelas&nama=$kelas");
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
                include 'navbar.php';
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
                    }

                    ?>

                    <h1 class="h3 mb-4 text-gray-800 text-center">Ubah data <?= $cek ?></h1>

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
                                            $user = $_GET['username'];

                                            $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' ");
                                            $result = mysqli_fetch_assoc($query);
                                        ?>
                                            <a href="./data-user.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required value="<?= $user ?>">
                                            </div>
                                            <div class="mb-4">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="text" class="form-control" name="password" id="password" placeholder="Masukkan Password" value="<?= $result['password'] ?>" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="level" class="form-label">Level</label>
                                                <select name="level" id="nama_siswa" class="form-control" required>
                                                    <option value="<?= $result['level'] ?>"><?= $result['level'] ?></option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Siswa">Siswa</option>
                                                    <option value="Guru">Guru</option>
                                                </select>
                                            </div>

                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="edit_user" value="Simpan">
                                            </div>

                                        <?php
                                        } elseif ($cek == 'kelas') {
                                            $nama = $_GET['nama'];

                                            $sql = mysqli_query($conn, "SELECT * FROM kelas WHERE nama_kelas = '$nama' ");
                                            $data = mysqli_fetch_assoc($sql);
                                        ?>
                                            <a href="./data-kelas.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <input type="hidden" name="id_kelas" value="<?= $data['id'] ?>">
                                            <div class="mb-4">
                                                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                                <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Masukkan Nama Mata Pelajaran" value="<?= $data['nama_kelas'] ?>" required>
                                            </div>
                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="edit_kelas" value="Simpan">
                                            </div>

                                        <?php
                                        } elseif ($cek == 'guru') {
                                            $username = $_GET['username'];

                                            $sql = mysqli_query($conn, "SELECT * FROM data_guru WHERE username = '$username' ");
                                            $data_guru = mysqli_fetch_assoc($sql);
                                        ?>
                                            <a href="./data-guru.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="username2" placeholder="Masukkan Username Siswa" value="<?= $data_guru['username'] ?>" readonly>

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
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK Guru" value="<?= $data_guru['nik'] ?>" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="nama_guru" class="form-label">Nama Guru</label>
                                                <input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Masukkan Nama Guru" value="<?= $data_guru['nama_guru'] ?>" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="mata_pelajaran1" class="form-label">Mata Pelajaran Ke-1</label>
                                                <input type="text" class="form-control" name="mata_pelajaran1" id="mata_pelajaran1" placeholder="Masukkan nama mata pelajaran" value="<?= $data_guru['mata_pelajaran1'] ?>" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="mata_pelajaran2" class="form-label">Mata Pelajaran Ke-2 <span>(Opsional)</span></label>
                                                <input type="text" class="form-control" name="mata_pelajaran2" id="mata_pelajaran2" value="<?= $data_guru['mata_pelajaran2'] ?>" placeholder="Masukkan nama mata pelajaran">
                                            </div>
                                            <div class="mb-4">
                                                <label for="mata_pelajaran3" class="form-label">Mata Pelajaran Ke-3 <span>(Opsional)</span></label>
                                                <input type="text" class="form-control" name="mata_pelajaran3" id="mata_pelajaran3" placeholder="Masukkan nama mata pelajaran" value="<?= $data_guru['mata_pelajaran3'] ?>">
                                            </div>
                                            <div class="mb-4">
                                                <label for="kelamin" class="form-label">Kelamin</label>
                                                <div class="row px-3">
                                                    <div class="form-check mr-3">
                                                        <input type="radio" name="kelamin" value="L" id="lk" class="form-check-input" <?php if ($data_guru['kelamin'] == 'L') echo 'checked' ?>>
                                                        <label class="form-check-label" for="lk">Laki-Laki</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="kelamin" value="P" id="p" class="form-check-input" <?php if ($data_guru['kelamin'] == 'P') echo 'checked' ?>>
                                                        <label class="form-check-label" for="p">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="edit_guru" value="Simpan">
                                            </div>

                                        <?php
                                        } elseif ($cek == 'siswa') {
                                            $username = $_GET['username'];

                                            $sql = mysqli_query($conn, "SELECT * FROM data_siswa WHERE username = '$username' ");
                                            $data = mysqli_fetch_assoc($sql);
                                        ?>

                                            <a href="./data-siswa.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" name="username" id="username2" placeholder="Masukkan Username Siswa" value="<?= $data['username'] ?>" readonly>

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
                                                <label for="nis" class="form-label">Nomor Induk Siswa</label>
                                                <input type="text" class="form-control" name="nis" id="nis" placeholder="Contoh : 192010007" value="<?= $data['nis'] ?>" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Contoh : Fauzi Aditya Pratama" value="<?= $data['nama_siswa'] ?>" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="nama_siswa" class="form-label">Pilih Kelas</label>
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
                                                <label for="nama_siswa" class="form-label">Kelamin</label>
                                                <div class="row mx-3">
                                                    <div class="form-check mr-3">
                                                        <input type="radio" name="kelamin" value="L" id="lk" class="form-check-input" <?php if ($data['kelamin'] == 'L') echo 'checked' ?>>
                                                        <label class="form-check-label" for="lk">Laki-Laki</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="kelamin" value="P" id="p" class="form-check-input" <?php if ($data['kelamin'] == 'P') echo 'checked' ?>>
                                                        <label class="form-check-label" for="p">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-2 text-center fill">
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="edit_siswa" value="Simpan">
                                            </div>

                                        <?php
                                        } elseif ($cek == 'mapel') {
                                            $kelas = $_GET['kelas'];
                                            $hari = $_GET['hari'];
                                            $cek_jadwal = $_GET['jadwal'];
                                            // CEK JADWAL 
                                            if ($cek_jadwal == 1) {
                                                $jadwal = "Pelajaran 1";
                                            } elseif ($cek_jadwal == 2) {
                                                $jadwal = "Pelajaran 2";
                                            } elseif ($cek_jadwal == 3) {
                                                $jadwal = "Pelajaran 3";
                                            } elseif ($cek_jadwal == 4) {
                                                $jadwal = "Pelajaran 4";
                                            } elseif ($cek_jadwal == 5) {
                                                $jadwal = "Pelajaran 5";
                                            }
                                        ?>

                                            <a href="detail.php?detail=kelas&nama=<?= $kelas ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                            <hr>

                                            <div class="mb-4">
                                                <label for="kelas" class="form-label">Kelas </label>
                                                <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $kelas ?>" readonly>
                                            </div>

                                            <div class="mb-4">
                                                <label for="hari" class="form-label">Hari</label>
                                                <input type="text" class="form-control" name="hari" id="hari" value="<?= $hari ?>" readonly>
                                            </div>

                                            <div class="mb-4">
                                                <label for="jadwal" class="form-label">Jadwal Pelajaran</label>
                                                <input type="text" class="form-control" name="jadwal" id="jadwal" value="<?= $jadwal ?>" readonly>
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
                                                <input type="submit" class="btn btn-primary w-100 mb-3" name="edit_mapel" value="Simpan">
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
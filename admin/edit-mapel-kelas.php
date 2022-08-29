<?php
session_start();

$title = "Data Mata Pelajaran Per Kelas";

require '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    $username = $_SESSION['admin'];
}

require '../function.php';

if (isset($_POST['edit_mapel'])) {
    // CEK HARI
    $hari = $_GET['hari'];
    if ($hari == "senin") {
        if (edit_senin($_POST) > 0) {
            header("location: data-pelajaran.php");
        }
    } elseif ($hari == "selasa") {
        if (edit_selasa($_POST) > 0) {
            header("location: data-pelajaran.php");
        }
    } elseif ($hari == "rabu") {
        if (edit_rabu($_POST) > 0) {
            header("location: data-pelajaran.php");
        }
    } elseif ($hari == "kamis") {
        if (edit_kamis($_POST) > 0) {
            header("location: data-pelajaran.php");
        }
    } elseif ($hari == "jumat") {
        if (edit_jumat($_POST) > 0) {
            header("location: data-pelajaran.php");
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" href="./">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require 'navbar.php';
    ?>

    <div class="p-5 container">
        <?php
        $cek = $_GET['kelas'];
        $hari = $_GET['hari'];

        ?>
        <h1 class="pt-5 text-center">Edit Data Mata Pelajaran Kelas <?= $cek; ?></h1>
        <h3 class="text-center pb-5">hari <?= $hari; ?></h3>
        <form action="" method="post">
            <input type="hidden" name="nama_kelas" value="<?= $cek ?>">

            <div class="mb-5">
                <h3 for="pelajaran1" class="form-label">Pelajaran 1</h3>
                <select name="pelajaran1" id="pelajaran1" class="form-select" required>

                    <?php
                    // Cek Kondisi Hari Mapel

                    if ($hari == "senin") {
                        $sql_senin = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_senin);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Senin

                        $pelajaran = $data['pelajaran1'];
                    } elseif ($hari == "selasa") {
                        $sql_selasa = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_selasa);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Selasa

                        $pelajaran = $data['pelajaran1'];
                    } elseif ($hari == "rabu") {
                        $sql_rabu = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_rabu);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Rabu

                        $pelajaran = $data['pelajaran1'];
                    } elseif ($hari == "kamis") {
                        $sql_kamis = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_kamis);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Kamis

                        $pelajaran = $data['pelajaran1'];
                    } elseif ($hari == "jumat") {
                        $sql_jumat = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_jumat);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Jumat

                        $pelajaran = $data['pelajaran1'];
                    }

                    $jadwal = mysqli_query($conn, "SELECT * FROM list_pelajaran WHERE kode_pelajaran = '$pelajaran' ");
                    $data = mysqli_fetch_assoc($jadwal);

                    ?>

                    <option value="<?= $data['kode_pelajaran'] ?>"><?= $data['mata_pelajaran'] ?></option>

                    <?php

                    // Menampilkan Semua Nama Mata Pelajaran Lengkap

                    $result = mysqli_query($conn, "SELECT * FROM list_pelajaran ORDER BY mata_pelajaran ASC");
                    while ($mapel = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?= $mapel['kode_pelajaran'] ?>"><?= $mapel['mata_pelajaran'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-5">
                <h3 for="pelajaran2" class="form-label">Pelajaran 2</h3>
                <select name="pelajaran2" id="pelajaran2" class="form-select" required>

                    <?php
                    // Cek Kondisi Hari Mapel

                    if ($hari == "senin") {
                        $sql_senin = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_senin);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Senin

                        $pelajaran = $data['pelajaran2'];
                    } elseif ($hari == "selasa") {
                        $sql_selasa = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_selasa);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Selasa

                        $pelajaran = $data['pelajaran2'];
                    } elseif ($hari == "rabu") {
                        $sql_rabu = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_rabu);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Rabu

                        $pelajaran = $data['pelajaran2'];
                    } elseif ($hari == "kamis") {
                        $sql_kamis = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_kamis);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Kamis

                        $pelajaran = $data['pelajaran2'];
                    } elseif ($hari == "jumat") {
                        $sql_jumat = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_jumat);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Jumat

                        $pelajaran = $data['pelajaran2'];
                    }

                    $jadwal = mysqli_query($conn, "SELECT * FROM list_pelajaran WHERE kode_pelajaran = '$pelajaran' ");
                    $data = mysqli_fetch_assoc($jadwal);

                    ?>

                    <option value="<?= $data['kode_pelajaran'] ?>"><?= $data['mata_pelajaran'] ?></option>

                    <?php

                    // Menampilkan Semua Nama Mata Pelajaran Lengkap

                    $result = mysqli_query($conn, "SELECT * FROM list_pelajaran ORDER BY mata_pelajaran ASC");
                    while ($mapel = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?= $mapel['kode_pelajaran'] ?>"><?= $mapel['mata_pelajaran'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-5">
                <h3 for="pelajaran3" class="form-label">Pelajaran 3</h3>
                <select name="pelajaran3" id="pelajaran3" class="form-select" required>

                    <?php
                    // Cek Kondisi Hari Mapel

                    if ($hari == "senin") {
                        $sql_senin = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_senin);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Senin

                        $pelajaran = $data['pelajaran3'];
                    } elseif ($hari == "selasa") {
                        $sql_selasa = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_selasa);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Selasa

                        $pelajaran = $data['pelajaran3'];
                    } elseif ($hari == "rabu") {
                        $sql_rabu = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_rabu);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Rabu

                        $pelajaran = $data['pelajaran3'];
                    } elseif ($hari == "kamis") {
                        $sql_kamis = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_kamis);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Kamis

                        $pelajaran = $data['pelajaran3'];
                    } elseif ($hari == "jumat") {
                        $sql_jumat = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_jumat);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Jumat

                        $pelajaran = $data['pelajaran3'];
                    }

                    $jadwal = mysqli_query($conn, "SELECT * FROM list_pelajaran WHERE kode_pelajaran = '$pelajaran' ");
                    $data = mysqli_fetch_assoc($jadwal);

                    ?>

                    <option value="<?= $data['kode_pelajaran'] ?>"><?= $data['mata_pelajaran'] ?></option>

                    <?php

                    // Menampilkan Semua Nama Mata Pelajaran Lengkap

                    $result = mysqli_query($conn, "SELECT * FROM list_pelajaran ORDER BY mata_pelajaran ASC");
                    while ($mapel = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?= $mapel['kode_pelajaran'] ?>"><?= $mapel['mata_pelajaran'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-5">
                <h3 for="pelajaran4" class="form-label">Pelajaran 4</h3>
                <select name="pelajaran4" id="pelajaran4" class="form-select" required>

                    <?php
                    // Cek Kondisi Hari Mapel

                    if ($hari == "senin") {
                        $sql_senin = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_senin);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Senin

                        $pelajaran = $data['pelajaran4'];
                    } elseif ($hari == "selasa") {
                        $sql_selasa = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_selasa);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Selasa

                        $pelajaran = $data['pelajaran4'];
                    } elseif ($hari == "rabu") {
                        $sql_rabu = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_rabu);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Rabu

                        $pelajaran = $data['pelajaran4'];
                    } elseif ($hari == "kamis") {
                        $sql_kamis = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_kamis);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Kamis

                        $pelajaran = $data['pelajaran4'];
                    } elseif ($hari == "jumat") {
                        $sql_jumat = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_jumat);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Jumat

                        $pelajaran = $data['pelajaran4'];
                    }

                    $jadwal = mysqli_query($conn, "SELECT * FROM list_pelajaran WHERE kode_pelajaran = '$pelajaran' ");
                    $data = mysqli_fetch_assoc($jadwal);

                    ?>

                    <option value="<?= $data['kode_pelajaran'] ?>"><?= $data['mata_pelajaran'] ?></option>

                    <?php

                    // Menampilkan Semua Nama Mata Pelajaran Lengkap

                    $result = mysqli_query($conn, "SELECT * FROM list_pelajaran ORDER BY mata_pelajaran ASC");
                    while ($mapel = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?= $mapel['kode_pelajaran'] ?>"><?= $mapel['mata_pelajaran'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-5">
                <h3 for="pelajara5" class="form-label">Pelajaran 5</h3>
                <select name="pelajaran5" id="pelajaran5" class="form-select" required>

                    <?php
                    // Cek Kondisi Hari Mapel

                    if ($hari == "senin") {
                        $sql_senin = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_senin);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Senin

                        $pelajaran = $data['pelajaran5'];
                    } elseif ($hari == "selasa") {
                        $sql_selasa = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_selasa);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Selasa

                        $pelajaran = $data['pelajaran5'];
                    } elseif ($hari == "rabu") {
                        $sql_rabu = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_rabu);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Rabu

                        $pelajaran = $data['pelajaran5'];
                    } elseif ($hari == "kamis") {
                        $sql_kamis = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_kamis);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Kamis

                        $pelajaran = $data['pelajaran5'];
                    } elseif ($hari == "jumat") {
                        $sql_jumat = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$cek' ");
                        $data = mysqli_fetch_assoc($sql_jumat);

                        // Ubah Kode Menjadi Nama Mata Pelajaran Lengkap Hari Jumat

                        $pelajaran = $data['pelajaran5'];
                    }

                    $jadwal = mysqli_query($conn, "SELECT * FROM list_pelajaran WHERE kode_pelajaran = '$pelajaran' ");
                    $data = mysqli_fetch_assoc($jadwal);

                    ?>

                    <option value="<?= $data['kode_pelajaran'] ?>"><?= $data['mata_pelajaran'] ?></option>

                    <?php

                    // Menampilkan Semua Nama Mata Pelajaran Lengkap

                    $result = mysqli_query($conn, "SELECT * FROM list_pelajaran ORDER BY mata_pelajaran ASC");
                    while ($mapel = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?= $mapel['kode_pelajaran'] ?>"><?= $mapel['mata_pelajaran'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="pt-2 text-center fill">
                <input type="submit" class="btn btn-primary w-25 mb-3" name="edit_mapel" value="Simpan">
            </div>
        </form>
    </div>
</body>

</html>
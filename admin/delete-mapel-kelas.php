<?php

require '../function.php';

$kelas = $_GET['kelas'];
$hari = $_GET['hari'];

if ($hari == "senin") {
    if (hapus_mapel_senin($kelas) > 0) {
        echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

        header("location:data-pelajaran.php");
    } else {
        echo mysqli_error($conn);
    }
} elseif ($hari == "selasa") {
    if (hapus_mapel_selasa($kelas) > 0) {
        echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

        header("location:data-pelajaran.php");
    } else {
        echo mysqli_error($conn);
    }
} elseif ($hari == "rabu") {
    if (hapus_mapel_rabu($kelas) > 0) {
        echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

        header("location:data-pelajaran.php");
    } else {
        echo mysqli_error($conn);
    }
} elseif ($hari == "kamis") {
    if (hapus_mapel_kamis($kelas) > 0) {
        echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

        header("location:data-pelajaran.php");
    } else {
        echo mysqli_error($conn);
    }
} elseif ($hari == "jumat") {
    if (hapus_mapel_jumat($kelas) > 0) {
        echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

        header("location:data-pelajaran.php");
    } else {
        echo mysqli_error($conn);
    }
}

<?php

require '../function.php';

$cek = $_GET['cek'];

if ($cek == "materi") {
    $id_mapel = $_GET['id'];

    if (hapus_materi($id_mapel) > 0) {

        echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

        header("location: materi.php");
    }
} elseif ($cek == "tugas") {
    $id_tugas = $_GET['id'];

    if (hapus_tugas($id_tugas) > 0) {

        echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

        header("location: tugas.php");
    }
}

<?php

require '../function.php';

$user = $_GET['username'];

if (hapus_siswa($user) > 0) {

    echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

    header("location:data-siswa.php");
} else {
    echo mysqli_error($conn);
}

if (hapus_guru($user) > 0) {

    echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

    header("location:data-guru.php");
} else {
    echo mysqli_error($conn);
}


if (hapus_user($user) > 0) {
    echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

    header("location:data-user.php");
} else {
    echo mysqli_error($conn);
};


$kelas = $_GET['kelas'];

if (hapus_kelas($kelas) > 0) {
    echo "<script>
            alert('Data Berhasil Dihapus!!');
        </script>";

    header("location:data-kelas.php");
} else {
    echo mysqli_error($conn);
};

// HAPUS MATA PELAJARAN DI JADWAL KELAS
$cek = $_GET['cek'];
if ($cek == 'mapel') {
    $hari = $_GET['hari'];

    // CEK HARI UNTUK JADWAL
    if ($hari == 'senin') {
        $jadwal = $_GET['jadwal'];
        if ($jadwal == 1) {
            $nama_kelas = $_GET['nama_kelas'];

            if (hapus_mapel1_senin($nama_kelas) > 0) {
                echo "<script>
                alert('Data Berhasil Dihapus!!');
            </script>";

                header("location:detail.php?detail=kelas&nama=$nama_kelas");
            } else {
                echo mysqli_error($conn);
            }
        } elseif ($jadwal == 2) {
            $nama_kelas = $_GET['nama_kelas'];

            if (hapus_mapel2_senin($nama_kelas) > 0) {
                echo "<script>
                alert('Data Berhasil Dihapus!!');
            </script>";

                header("location:detail.php?detail=kelas&nama=$nama_kelas");
            } else {
                echo mysqli_error($conn);
            }
        } elseif ($jadwal == 3) {
            $nama_kelas = $_GET['nama_kelas'];

            if (hapus_mapel3_senin($nama_kelas) > 0) {
                echo "<script>
                alert('Data Berhasil Dihapus!!');
            </script>";

                header("location:detail.php?detail=kelas&nama=$nama_kelas");
            } else {
                echo mysqli_error($conn);
            }
        } elseif ($jadwal == 4) {
            $nama_kelas = $_GET['nama_kelas'];

            if (hapus_mapel4_senin($nama_kelas) > 0) {
                echo "<script>
                alert('Data Berhasil Dihapus!!');
            </script>";

                header("location:detail.php?detail=kelas&nama=$nama_kelas");
            } else {
                echo mysqli_error($conn);
            }
        } elseif ($jadwal == 5) {
            $nama_kelas = $_GET['nama_kelas'];

            if (hapus_mapel5_senin($nama_kelas) > 0) {
                echo "<script>
                alert('Data Berhasil Dihapus!!');
            </script>";

                header("location:detail.php?detail=kelas&nama=$nama_kelas");
            } else {
                echo mysqli_error($conn);
            }
        }
    } elseif ($hari == 'selasa') {
        $jadwal = $_GET['jadwal'];
        if ($jadwal == 1) {
            $nama_kelas = $_GET['nama_kelas'];

            if (hapus_mapel1_selasa($nama_kelas) > 0) {
                echo "<script>
                alert('Data Berhasil Dihapus!!');
            </script>";

                header("location:detail.php?detail=kelas&nama=$nama_kelas");
            } else {
                echo mysqli_error($conn);
            }
        } elseif ($jadwal == 2) {
            $nama_kelas = $_GET['nama_kelas'];

            if (hapus_mapel2_selasa($nama_kelas) > 0) {
                echo "<script>
                alert('Data Berhasil Dihapus!!');
            </script>";

                header("location:detail.php?detail=kelas&nama=$nama_kelas");
            } else {
                echo mysqli_error($conn);
            }
        } elseif ($jadwal == 3) {
            $nama_kelas = $_GET['nama_kelas'];

            if (hapus_mapel3_selasa($nama_kelas) > 0) {
                echo "<script>
                alert('Data Berhasil Dihapus!!');
            </script>";

                header("location:detail.php?detail=kelas&nama=$nama_kelas");
            } else {
                echo mysqli_error($conn);
            }
        } elseif ($jadwal == 4) {
            $nama_kelas = $_GET['nama_kelas'];

            if (hapus_mapel4_selasa($nama_kelas) > 0) {
                echo "<script>
                alert('Data Berhasil Dihapus!!');
            </script>";

                header("location:detail.php?detail=kelas&nama=$nama_kelas");
            } else {
                echo mysqli_error($conn);
            }
        } elseif ($jadwal == 5) {
            $nama_kelas = $_GET['nama_kelas'];

            if (hapus_mapel5_selasa($nama_kelas) > 0) {
                echo "<script>
                alert('Data Berhasil Dihapus!!');
            </script>";

                header("location:detail.php?detail=kelas&nama=$nama_kelas");
            } else {
                echo mysqli_error($conn);
            }
        }
    }
}

<?php
require 'koneksi.php';

function daftarSiswa()
{
    global $conn;

    $username = $_POST['username'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas_siswa'];
    $kelamin = $_POST['kelamin'];

    // CEK USERNAME
    $cek = mysqli_query($conn, "SELECT username FROM data_siswa WHERE username = '$username' ");
    if (mysqli_fetch_assoc($cek)) {
        echo "<script>
                alert('Username sudah terdaftar !!');
            </script>";

        return false;
    }


    mysqli_query($conn, "INSERT INTO data_siswa VALUES('','$username','$nis','$nama_siswa','$kelas','$kelamin') ");
    return mysqli_affected_rows($conn);
}

function data_guru()
{
    global $conn;

    $username = $_POST['username'];
    $nik = $_POST['nik'];
    $nama_guru = $_POST['nama_guru'];
    $mata_pelajaran1 = $_POST['mata_pelajaran1'];
    $mata_pelajaran2 = $_POST['mata_pelajaran2'];
    $mata_pelajaran3 = $_POST['mata_pelajaran3'];
    $kelamin = $_POST['kelamin'];

    // CEK USERNAME
    $cek = mysqli_query($conn, "SELECT username FROM data_guru WHERE username = '$username' ");
    if (mysqli_fetch_assoc($cek)) {
        echo "<script>
                alert('Username sudah terdaftar !!');
            </script>";

        return false;
    }

    mysqli_query($conn, "INSERT INTO data_guru VALUES('','$username','$nik','$nama_guru','$mata_pelajaran1','$mata_pelajaran2','$mata_pelajaran3','$kelamin') ");
    return mysqli_affected_rows($conn);
}

function data_user()
{
    global $conn;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $cek = mysqli_query($conn, "SELECT username FROM user WHERE username='$username' ");
    if (mysqli_fetch_assoc($cek)) {
        echo "<script>
                alert('Username sudah terdaftar !!');
            </script>";

        return false;
    }

    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$level') ");
    return mysqli_affected_rows($conn);
}

function tambah_mapel()
{
    global $conn;

    $kelas = $_POST['kelas'];
    $hari = $_POST['hari'];
    $jadwal = $_POST['jadwal'];
    $pelajaran = $_POST['mata_pelajaran'];

    // 
    // TAMBAH DATA MAPEL SENIN
    if ($hari == 'senin') {
        if ($jadwal == 'pelajaran1') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$kelas' AND pelajaran1 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_senin SET pelajaran1 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran2') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$kelas' AND pelajaran2 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_senin SET pelajaran2 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran3') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$kelas' AND pelajaran3 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_senin SET pelajaran3 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran4') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$kelas' AND pelajaran4 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_senin SET pelajaran4 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran5') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_senin WHERE nama_kelas = '$kelas' AND pelajaran5 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_senin SET pelajaran5 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        }
    }

    // 
    // TAMBAH DATA MAPEL SELASA
    elseif ($hari == 'selasa') {
        if ($jadwal == 'pelajaran1') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$kelas' AND pelajaran1 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran1 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran2') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$kelas' AND pelajaran2 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran2 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran3') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$kelas' AND pelajaran3 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran3 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran4') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$kelas' AND pelajaran4 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran4 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran5') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_selasa WHERE nama_kelas = '$kelas' AND pelajaran5 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran5 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        }
    }

    // 
    // TAMBAH DATA MAPEL RABU
    elseif ($hari == 'rabu') {
        if ($jadwal == 'pelajaran1') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$kelas' AND pelajaran1 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_rabu SET pelajaran1 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran2') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$kelas' AND pelajaran2 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_rabu SET pelajaran2 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran3') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$kelas' AND pelajaran3 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_rabu SET pelajaran3 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran4') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$kelas' AND pelajaran4 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_rabu SET pelajaran4 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran5') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_rabu WHERE nama_kelas = '$kelas' AND pelajaran5 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_rabu SET pelajaran5 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        }
    }


    // 
    // TAMBAH DATA MAPEL KAMIS
    elseif ($hari == 'kamis') {
        if ($jadwal == 'pelajaran1') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$kelas' AND pelajaran1 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_kamis SET pelajaran1 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran2') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$kelas' AND pelajaran2 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_kamis SET pelajaran2 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran3') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$kelas' AND pelajaran3 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_kamis SET pelajaran3 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran4') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$kelas' AND pelajaran4 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_kamis SET pelajaran4 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran5') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_kamis WHERE nama_kelas = '$kelas' AND pelajaran5 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_kamis SET pelajaran5 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        }
    }

    // 
    // TAMBAH DATA MAPEL JUMAT
    elseif ($hari == 'jumat') {
        if ($jadwal == 'pelajaran1') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$kelas' AND pelajaran1 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_jumat SET pelajaran1 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran2') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$kelas' AND pelajaran2 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_jumat SET pelajaran2 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran3') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$kelas' AND pelajaran3 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_jumat SET pelajaran3 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran4') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$kelas' AND pelajaran4 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_jumat SET pelajaran4 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        } elseif ($jadwal == 'pelajaran5') {
            // CEK Jadwal Pelajaran
            $cek = mysqli_query($conn, "SELECT * FROM mapel_jumat WHERE nama_kelas = '$kelas' AND pelajaran5 != '' ");
            if (mysqli_fetch_assoc($cek)) {
                echo "<script>
                    alert('Jadwal pelajaran sudah terdaftar !!');
                </script>";

                return false;
            } else {
                mysqli_query($conn, "UPDATE mapel_jumat SET pelajaran5 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
                return mysqli_affected_rows($conn);
            }
        }
    }
}



function tambah_kelas()
{
    global $conn;

    $kelas = $_POST['nama_kelas'];

    $cek = mysqli_query($conn, "SELECT nama_kelas FROM kelas WHERE nama_kelas = '$kelas' ");
    if (mysqli_fetch_assoc($cek)) {
        echo "<script>
                alert('Kelas sudah terdaftar !!');
            </script>";

        return false;
    }

    mysqli_query($conn, "INSERT INTO kelas VALUES('','$kelas') ");
    mysqli_query($conn, "INSERT INTO mapel_senin VALUES('','$kelas','','','','','') ");
    mysqli_query($conn, "INSERT INTO mapel_selasa VALUES('','$kelas','','','','','') ");
    mysqli_query($conn, "INSERT INTO mapel_rabu VALUES('','$kelas','','','','','') ");
    mysqli_query($conn, "INSERT INTO mapel_kamis VALUES('','$kelas','','','','','') ");
    mysqli_query($conn, "INSERT INTO mapel_jumat VALUES('','$kelas','','','','','') ");

    return mysqli_affected_rows($conn);
}


function data_materi()
{
    global $conn;

    $nama_penulis = $_POST['nama_penulis'];
    $kelas = $_POST['kelas'];
    $pelajaran = $_POST['pelajaran'];
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    // UPLOAD FILE 
    $direktori = "berkas/";
    $file_name = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $direktori . $file_name);

    mysqli_query($conn, "INSERT INTO materi VALUES ('','$nama_penulis','$pelajaran','$kelas','$judul','$tanggal','$deskripsi','$file_name') ");
    return mysqli_affected_rows($conn);
}

function data_tugas()
{
    global $conn;

    $nama_penulis = $_POST['nama_penulis'];
    $pelajaran = $_POST['pelajaran'];
    $kelas = $_POST['kelas'];
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    // UPLOAD FILE 
    $direktori = "berkas/";
    $file_name = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $direktori . $file_name);

    mysqli_query($conn, "INSERT INTO tugas VALUES ('','$nama_penulis','$pelajaran','$kelas','$judul','$tanggal','$deskripsi','$file_name') ");
    return mysqli_affected_rows($conn);
}


// 
// Function Edit
// 


function edit_siswa()
{
    global $conn;

    $username = $_POST['username'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas_siswa'];
    $kelamin = $_POST['kelamin'];

    mysqli_query($conn, "UPDATE data_siswa SET username = '$username',nis = '$nis', nama_siswa = '$nama_siswa', kelas_siswa = '$kelas', kelamin = '$kelamin' WHERE username = '$username' ");
    return mysqli_affected_rows($conn);
}

function edit_user()
{
    global $conn;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $cek_siswa = mysqli_query($conn, "SELECT * FROM data_siswa WHERE username = '$username' ");
    $user_cek = mysqli_fetch_assoc($cek_siswa);

    $cek_guru = mysqli_query($conn, "SELECT * FROM data_guru WHERE username = '$username' ");
    $guru_cek = mysqli_fetch_assoc($cek_guru);

    if ($level == 'Siswa') {
        if ($user_cek['username'] == 1) {
            mysqli_query($conn, "UPDATE user SET username = '$username', password = '$password', level = '$level' WHERE username = '$username' ");
        } else {
            mysqli_query($conn, "UPDATE data_siswa SET username = '$username' WHERE username = '$username' ");
            mysqli_query($conn, "UPDATE user SET username = '$username', password = '$password', level = '$level' WHERE username = '$username' ");
        }
    } elseif ($level == 'Guru') {

        if ($guru_cek['username'] == 1) {
            mysqli_query($conn, "UPDATE user SET username = '$username', password = '$password', level = '$level' WHERE username = '$username' ");
        } else {
            mysqli_query($conn, "UPDATE data_guru SET username = '$username' WHERE username = '$username' ");
            mysqli_query($conn, "UPDATE user SET username = '$username', password = '$password', level = '$level' WHERE username = '$username' ");
        }
    }
    return mysqli_affected_rows($conn);
}

function edit_kelas()
{
    global $conn;

    $id = $_POST['id_kelas'];
    $kelas = $_POST['nama_kelas'];

    mysqli_query($conn, "UPDATE kelas SET nama_kelas = '$kelas' WHERE id = '$id' ");

    mysqli_query($conn, "UPDATE mapel_senin SET nama_kelas = '$kelas' WHERE id = '$id' ");
    mysqli_query($conn, "UPDATE mapel_selasa SET nama_kelas = '$kelas' WHERE id = '$id' ");
    mysqli_query($conn, "UPDATE mapel_rabu SET nama_kelas = '$kelas' WHERE id = '$id' ");
    mysqli_query($conn, "UPDATE mapel_kamis SET nama_kelas = '$kelas' WHERE id = '$id' ");
    mysqli_query($conn, "UPDATE mapel_jumat SET nama_kelas = '$kelas' WHERE id = '$id' ");

    return mysqli_affected_rows($conn);
}

function edit_guru()
{
    global $conn;

    $username = $_POST['username'];
    $nik = $_POST['nik'];
    $nama_guru = $_POST['nama_guru'];
    $kelamin = $_POST['kelamin'];
    $mata_pelajaran1 = $_POST['mata_pelajaran1'];
    $mata_pelajaran2 = $_POST['mata_pelajaran2'];
    $mata_pelajaran3 = $_POST['mata_pelajaran3'];


    mysqli_query($conn, "UPDATE data_guru SET username = '$username', nik = '$nik', nama_guru = '$nama_guru', mata_pelajaran1 = '$mata_pelajaran1', mata_pelajaran2 = '$mata_pelajaran2',mata_pelajaran3 = '$mata_pelajaran3', kelamin = '$kelamin' WHERE username = '$username' ");
    return mysqli_affected_rows($conn);
}

function edit_mapel()
{
    global $conn;

    $kelas = $_POST['kelas'];
    $hari = $_POST['hari'];
    $jadwal = $_POST['jadwal'];
    $pelajaran = $_POST['mata_pelajaran'];

    // CEK HARI
    if ($hari == "Senin") {
        // CEK JADWAL PELAJARAN
        if ($jadwal == "Pelajaran 1") {
            mysqli_query($conn, "UPDATE mapel_senin SET pelajaran1 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 2") {
            mysqli_query($conn, "UPDATE mapel_senin SET pelajaran2 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 3") {
            mysqli_query($conn, "UPDATE mapel_senin SET pelajaran3 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 4") {
            mysqli_query($conn, "UPDATE mapel_senin SET pelajaran4 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 5") {
            mysqli_query($conn, "UPDATE mapel_senin SET pelajaran5 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        }
    } elseif ($hari == "Selasa") {
        // CEK JADWAL PELAJARAN
        if ($jadwal == "Pelajaran 1") {
            mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran1 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 2") {
            mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran2 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 3") {
            mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran3 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 4") {
            mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran4 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 5") {
            mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran5 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        }
    } elseif ($hari == "Rabu") {
        // CEK JADWAL PELAJARAN
        if ($jadwal == "Pelajaran 1") {
            mysqli_query($conn, "UPDATE mapel_rabu SET pelajaran1 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 2") {
            mysqli_query($conn, "UPDATE mapel_rabu SET pelajaran2 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 3") {
            mysqli_query($conn, "UPDATE mapel_rabu SET pelajaran3 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 4") {
            mysqli_query($conn, "UPDATE mapel_rabu SET pelajaran4 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 5") {
            mysqli_query($conn, "UPDATE mapel_rabu SET pelajaran5 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        }
    } elseif ($hari == "Kamis") {
        // CEK JADWAL PELAJARAN
        if ($jadwal == "Pelajaran 1") {
            mysqli_query($conn, "UPDATE mapel_kamis SET pelajaran1 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 2") {
            mysqli_query($conn, "UPDATE mapel_kamis SET pelajaran2 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 3") {
            mysqli_query($conn, "UPDATE mapel_kamis SET pelajaran3 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 4") {
            mysqli_query($conn, "UPDATE mapel_kamis SET pelajaran4 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 5") {
            mysqli_query($conn, "UPDATE mapel_kamis SET pelajaran5 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        }
    } elseif ($hari == "Jumat") {
        // CEK JADWAL PELAJARAN
        if ($jadwal == "Pelajaran 1") {
            mysqli_query($conn, "UPDATE mapel_jumat SET pelajaran1 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 2") {
            mysqli_query($conn, "UPDATE mapel_jumat SET pelajaran2 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 3") {
            mysqli_query($conn, "UPDATE mapel_jumat SET pelajaran3 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 4") {
            mysqli_query($conn, "UPDATE mapel_jumat SET pelajaran4 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        } elseif ($jadwal == "Pelajaran 5") {
            mysqli_query($conn, "UPDATE mapel_jumat SET pelajaran5 = '$pelajaran' WHERE nama_kelas = '$kelas' ");
        }
    }

    return mysqli_affected_rows($conn);
}

function edit_materi()
{
    global $conn;

    $id = $_POST['id'];
    $kelas = $_POST['kelas'];
    $pelajaran = $_POST['pelajaran'];
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    // CEK KONDISI FIELD FILE
    $filesize = $_FILES['file']['size'];

    if ($filesize > 0) {
        $direktori = "berkas/";
        $file_name = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $direktori . $file_name);

        mysqli_query($conn, "UPDATE materi SET pelajaran = '$pelajaran', kelas = '$kelas', judul_materi = '$judul', tanggal_unggah = '$tanggal', deskripsi = '$deskripsi', file = '$file_name' WHERE id = '$id' ");
    } else {

        mysqli_query($conn, "UPDATE materi SET pelajaran = '$pelajaran', kelas = '$kelas', judul_materi = '$judul', tanggal_unggah = '$tanggal', deskripsi = '$deskripsi' WHERE id = '$id' ");
    }

    return mysqli_affected_rows($conn);
}

function edit_tugas()
{
    global $conn;

    $id = $_POST['id'];
    $kelas = $_POST['kelas'];
    $pelajaran = $_POST['pelajaran'];
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    // CEK KONDISI FIELD FILE
    $filesize = $_FILES['file']['size'];

    if ($filesize > 0) {
        $direktori = "berkas/";
        $file_name = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $direktori . $file_name);

        mysqli_query($conn, "UPDATE tugas SET pelajaran = '$pelajaran', kelas = '$kelas', judul_tugas = '$judul', tanggal_unggah = '$tanggal', deskripsi = '$deskripsi', file = '$file_name' WHERE id = '$id' ");
    } else {

        mysqli_query($conn, "UPDATE tugas SET pelajaran = '$pelajaran', kelas = '$kelas', judul_tugas = '$judul', tanggal_unggah = '$tanggal', deskripsi = '$deskripsi' WHERE id = '$id' ");
    }

    return mysqli_affected_rows($conn);
}


// 
// Function Hapus
// 


function hapus_user($user)
{
    global $conn;

    $sql = mysqli_query($conn, "DELETE FROM user WHERE username = '$user' ");

    return mysqli_affected_rows($conn);
}

function hapus_siswa($user)
{
    global $conn;

    $sql = mysqli_query($conn, "DELETE FROM data_siswa WHERE username = '$user' ");

    return mysqli_affected_rows($conn);
}

function hapus_guru($user)
{
    global $conn;

    $sql = mysqli_query($conn, "DELETE FROM data_guru WHERE username = '$user' ");

    return mysqli_affected_rows($conn);
}

function hapus_kelas($kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "DELETE FROM kelas WHERE nama_kelas = '$kelas' ");
    $mapel_senin = mysqli_query($conn, "DELETE FROM mapel_senin WHERE nama_kelas = '$kelas' ");
    $mapel_selasa = mysqli_query($conn, "DELETE FROM mapel_selasa WHERE nama_kelas = '$kelas' ");
    $mapel_rabu = mysqli_query($conn, "DELETE FROM mapel_rabu WHERE nama_kelas = '$kelas' ");
    $mapel_kamis = mysqli_query($conn, "DELETE FROM mapel_kamis WHERE nama_kelas = '$kelas' ");
    $mapel_jumat = mysqli_query($conn, "DELETE FROM mapel_jumat WHERE nama_kelas = '$kelas' ");

    return mysqli_affected_rows($conn);
}


// 
// FUNCTION HAPUS MAPEL KELAS HARI SENIN
// 
function hapus_mapel1_senin($nama_kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "UPDATE mapel_senin SET pelajaran1 = '' WHERE nama_kelas = '$nama_kelas' ");

    return mysqli_affected_rows($conn);
}

function hapus_mapel2_senin($nama_kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "UPDATE mapel_senin SET pelajaran2 = '' WHERE nama_kelas = '$nama_kelas' ");

    return mysqli_affected_rows($conn);
}

function hapus_mapel3_senin($nama_kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "UPDATE mapel_senin SET pelajaran3 = '' WHERE nama_kelas = '$nama_kelas' ");

    return mysqli_affected_rows($conn);
}

function hapus_mapel4_senin($nama_kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "UPDATE mapel_senin SET pelajaran4 = '' WHERE nama_kelas = '$nama_kelas' ");

    return mysqli_affected_rows($conn);
}

function hapus_mapel5_senin($nama_kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "UPDATE mapel_senin SET pelajaran5 = '' WHERE nama_kelas = '$nama_kelas' ");

    return mysqli_affected_rows($conn);
}

// 
// FUNCTION HAPUS MAPEL KELAS HARI SELASA
// 
function hapus_mapel1_selasa($nama_kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran1 = '' WHERE nama_kelas = '$nama_kelas' ");

    return mysqli_affected_rows($conn);
}

function hapus_mapel2_selasa($nama_kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran2 = '' WHERE nama_kelas = '$nama_kelas' ");

    return mysqli_affected_rows($conn);
}

function hapus_mapel3_selasa($nama_kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran3 = '' WHERE nama_kelas = '$nama_kelas' ");

    return mysqli_affected_rows($conn);
}

function hapus_mapel4_selasa($nama_kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran4 = '' WHERE nama_kelas = '$nama_kelas' ");

    return mysqli_affected_rows($conn);
}

function hapus_mapel5_selasa($nama_kelas)
{
    global $conn;

    $sql = mysqli_query($conn, "UPDATE mapel_selasa SET pelajaran5 = '' WHERE nama_kelas = '$nama_kelas' ");

    return mysqli_affected_rows($conn);
}



function hapus_materi($id_mapel)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM materi WHERE id = '$id_mapel' ");

    return mysqli_affected_rows($conn);
}

function hapus_tugas($id_tugas)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tugas WHERE id = '$id_tugas' ");

    return mysqli_affected_rows($conn);
}

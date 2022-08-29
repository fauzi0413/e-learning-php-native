<?php

session_start();

$title = "Login Page";
require 'koneksi.php';

if (isset($_SESSION['admin'])) {
    header('location:admin.php');
} elseif (isset($_SESSION['user'])) {
    header('location:index.php');
}


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password' ");
    $hasil = mysqli_fetch_assoc($result);
    // Cek Username dan password
    if (mysqli_num_rows($result) === 1) {
        // set session
        if ($hasil['level'] == 'Admin') {
            $_SESSION['admin'] = $hasil['username'];
            $_SESSION['level'] = $hasil['level'];
            header('location:admin.php');
        } elseif ($hasil['level'] == 'Siswa') {
            $_SESSION['user'] = $hasil['username'];
            $_SESSION['level'] = $hasil['level'];
            header('location:user.php');
        } elseif ($hasil['level'] == 'Guru') {
            $_SESSION['guru'] = $hasil['username'];
            $_SESSION['level'] = $hasil['level'];
            header('location:guru.php');
        }
    }

    $error = true;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div class="col-md-12" style="padding-top: 100px;">
        <div class="card card-rounded border-light mx-auto shadow" style="width: 30rem;">
            <h3 class="text-center fw-bold pt-5">MASUK</h3>
            <div class="mx-5 pb-5">

                <?php if (isset($error)) : ?>
                    <?php
                    echo "<script>
                            alert('username atau password salah, silahkan di cek kembali');
                        </script>"
                    ?>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                    </div>
                    <div class="pt-2 text-center fill">
                        <input type="submit" class="btn btn-primary w-25 mb-3" name="login" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
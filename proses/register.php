<?php
require('koneksi.php');
session_start();

$error = '';
$validate = '';

if (isset($_SESSION['user'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($koneksi, $username);
    $name = stripslashes($_POST['name']);
    $name = mysqli_real_escape_string($koneksi, $name);
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($koneksi, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($koneksi, $password);
    $repass = stripslashes($_POST['repassword']);
    $repass = mysqli_real_escape_string($koneksi, $repass);

    if (!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))) {
        if ($password == $repass) {
            if (cek_nama($name, $koneksi) == 0) {
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (username, name, email, password) VALUES ('$username', '$name', '$email', '$pass')";
                $result = mysqli_query($koneksi, $query);

                if ($result) {
                    $_SESSION['username'] = $username;
                    header('Location: index.php');
                } else {
                    $error = 'Register User Gagal !!';
                }
            } else {
                $error = 'Username sudah terdaftar !!';
            }
        } else {
            $validate = 'Password tidak sama !!';
        }
    } else {
        $error = 'Data tidak boleh kosong !!';
    }
}

function cek_nama($username, $koneksi)
{
    $nama = mysqli_real_escape_string($koneksi, $username);
    $query = "SELECT * FROM users WHERE username = '$nama'";
    if ($result = mysqli_query($koneksi, $query)) return mysqli_num_rows($result);
}
?>

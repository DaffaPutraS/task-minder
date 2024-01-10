<?php
require('koneksi.php');
session_start();

$error = '';
$validate = '';

$_SESSION['username'] = $username; // Simpan informasi user_id ke dalam session

if (isset($_SESSION['username'])) {
    header('Location: ../index.php');
}

if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($koneksi, $password);

    $userCaptcha = $_POST['kodecaptcha'];
    $captchaSession = $_SESSION['code'];

    if (empty($userCaptcha) || strtolower($userCaptcha) !== strtolower($captchaSession)) {
        echo '<script>alert("Captcha salah"); window.location="../login-page.php"</script>';
    } else {
        if (!empty(trim($username)) && !empty(trim($password))) {
            $query  = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($koneksi, $query);
            $rows   = mysqli_num_rows($result);

            if ($rows != 0) {
                $hash  = mysqli_fetch_assoc($result)['password'];
                if (password_verify($password, $hash)) {
                    $_SESSION['username'] = $username;
                    header('Location: ../index.php');
                    exit();
                } else {
                    $error = '<span class="error">Password tidak cocok !!</span>';
                }
            } else {
                $error = '<span class="error">Login gagal !!</span>';
            }
        }
    }
}
?>

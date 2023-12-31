<?php
require('proses/koneksi.php');
session_start();

$error = '';
$validate = '';

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($koneksi, $password);

    $userCaptcha = $_POST['kodecaptcha'];
    $captchaSession = $_SESSION['code'];

    if (empty($userCaptcha) || strtolower($userCaptcha) !== strtolower($captchaSession)) {
        echo '<script>alert("Captcha salah"); window.location="login-page.php"</script>';
    } else {
        if (!empty(trim($username)) && !empty(trim($password))) {
            $query  = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($koneksi, $query);
            $rows   = mysqli_num_rows($result);

            if ($rows != 0) {
                $hash  = mysqli_fetch_assoc($result)['password'];
                if (password_verify($password, $hash)) {
                    $_SESSION['username'] = $username;
                    header('Location: index.php');
                    exit();
                } else {
                    // Password salah
                    $error = 'Password salah !!';
                }
            } else {
                // Username salah
                $error = 'Username tidak ditemkan';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="css/style-login.css">

    <!--- Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Icon Title Link-->
    <link rel="Icon" href="img/logo.png" type="image/x-icon">

    <!-- Font Awesome CDN Link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <div class="background">
    <?php
        if ($error) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 300px; position: fixed; top: 20px; right: 20px;">
                    <strong>Error!</strong> ' . $error . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        ?>    
        <section class="login-container">
            <div class="book-img">
                <img src="img/buku.png" alt="Books Image"/>
            </div>
            <div class="form">
                <form action="login-page.php" method="POST">
                    <h2><b>Sign In</b></h2>

                    <div class="input-username">
                        <input type="text" placeholder="Username" name="username" required>
                    </div>
                    <div class="input-password">
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="captcha">
                        <img src="proses/captcha.php" alt="gambar"><br>
                    </div>
                    <div class="input-captcha">
                        <input type="text" placeholder="captcha" name="kodecaptcha" value="" maxlength="5" required>
                    </div>
                    
                    <button class="bn632-hover bn18" type="submit" name="submit" >login</button>
                    
                    <div class="href-register">
                        <p>Belum punya account? <a href="register-page.php">Register</a></p>
                    </div>
                </form>
            </div>
        </section>
    </div>

    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy6pZl3/JfxI65qD5V/s2IeVFYfH9SmoQ5" crossorigin="anonymous"></script>
    
    <!-- ... (setelah modal) -->
</body>
</html>

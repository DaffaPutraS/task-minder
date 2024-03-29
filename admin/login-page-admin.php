<?php
require('../proses/koneksi.php');
session_start();

$error = '';

if (isset($_SESSION['username'])) {
    header('Location: index-admin.php');
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="../css/style-login-admin.css">

    <!--- Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Icon Title Link-->
    <link rel="Icon" href="../img/logo.png" type="image/x-icon">

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Refresh Captcha Script -->
    <script>
        $(document).ready(function () {
            // Fungsi untuk memuat captcha dari server
            function loadCaptcha() {
                $.ajax({
                    url: '../proses/captcha.php?' + new Date().getTime(),
                    type: 'GET',
                    dataType: 'text',  // Ganti dataType menjadi 'text'
                    success: function (data) {
                        // Menampilkan captcha pada halaman web
                        var captchaImage = $('.captcha img');
                        captchaImage.attr('src', 'data:image/jpeg;base64,' + data);  // Menambahkan 'data:image/jpeg;base64,' untuk menampilkan gambar secara langsung
                    },
                    error: function (error) {
                        console.error('Error:', error);
                    }
                });
            }

            // Memuat captcha saat halaman pertama kali dimuat
            loadCaptcha();

            // Meng-handle klik tombol refresh
            $('#refresh-captcha-btn').click(function () {
                loadCaptcha(); // Memuat captcha baru saat tombol di-klik
            });
        });
    </script>
</head>
<body>
    <div class="background">
        <?php
        // Menampilkan pesan error (jika ada)
            if ($error) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 300px; position: fixed; top: 20px; right: 20px;">
                        <strong>Error!</strong> ' . $error . '
                    </div>';
            }

        // Memeriksa apakah formulir submit telah dikirim
        if (isset($_POST['submit'])) {
            $username = stripslashes($_POST['username']);
            $username = mysqli_real_escape_string($koneksi, $username);
            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($koneksi, $password);

            $userCaptcha = $_POST['kodecaptcha'];
            $captchaSession = $_SESSION['code'];

            // Memeriksa apakah captcha yang dimasukkan benar
            if (empty($userCaptcha) || $userCaptcha !== $captchaSession) {
                echo '<script>
                        Swal.fire({
                            icon: "warning",
                            title: "Captcha salah!",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>';
            } else {
                // Memeriksa apakah username dan password tidak kosong
                if (!empty(trim($username)) && !empty(trim($password))) {
                    $query  = "SELECT * FROM admin WHERE username = '$username'";
                    $result = mysqli_query($koneksi, $query);
                    $rows   = mysqli_num_rows($result);

                    // Memeriksa apakah username ada dalam database
                    if ($rows != 0) {
                        $storedPassword  = mysqli_fetch_assoc($result)['password'];
                        // Memeriksa apakah password sesuai
                        if ($password === $storedPassword) {
                            $_SESSION['username'] = $username;
                            // Menampilkan pesan sukses dan mengarahkan ke halaman admin
                            echo '<script>
                                    Swal.fire({
                                        icon: "success",
                                        title: "Login berhasil!",
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(() => {
                                        window.location="index-admin.php";
                                    });
                            </script>';
                            exit();
                        } else {
                            // Password salah
                            echo '<script>
                                    Swal.fire({
                                        icon: "warning",
                                        title: "Password Salah!",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                            </script>';
                        }
                    } else {
                        // Username salah
                        echo '<script>
                                    Swal.fire({
                                        icon: "warning",
                                        title: "Username tidak ada!",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                            </script>';
                    }
                }
            }
        }

        ?>
        <section class="login-container">
            <div class="book-img">
                <img src="../img/buku.png" alt="Books Image"/>
            </div>
            <div class="form">
                <form action="login-page-admin.php" method="POST">
                    <h2><b>Admin Only!</b></h2>

                    <div class="input-username">
                        <input type="text" placeholder="Username" name="username" required>
                    </div>
                    <div class="input-password">
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="refresh-captcha">
                        <button type="button" id="refresh-captcha-btn">Refresh Captcha</button>
                    </div>
                    <div class="captcha">
                        <img src="../proses/captcha.php" alt="gambar"><br>
                    </div>
                    <div class="input-captcha">
                        <input type="text" placeholder="captcha" name="kodecaptcha" value="" maxlength="5" required>
                    </div>

                    
                    
                    <button class="bn632-hover bn18" type="submit" name="submit" >login</button>
                    <div class="href-register">
                        <a href="../index.php">Kembali ke Beranda</a></p>
                    </div>

                </form>

            </div>
        </section>
    </div>

    
                        
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy6pZl3/JfxI65qD5V/s2IeVFYfH9SmoQ5" crossorigin="anonymous"></script>
</body>
</html>

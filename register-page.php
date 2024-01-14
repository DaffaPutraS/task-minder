<?php
// Menggunakan koneksi.php untuk menyambungkan ke database
require('proses/koneksi.php');

// Memulai sesi
session_start();




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="css/style-register.css">

    <!--- Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Icon Title Link-->
    <link rel="Icon" href="img/logo.png" type="image/x-icon">

    <!-- Font Awesome CDN Link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <!-- Navbar Section -->
    <div class="background"> 
    <?php
                $error = '';
                $validate = '';
                
                // Redirect ke login-page jika sudah login
                if (isset($_SESSION['username'])) {
                    header("Location: login-page.php");
                }

                // Menangani submit form
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

                    

                    // Memastikan tidak ada data yang kosong
                    if (!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))) {
                        // Memastikan password dan repassword sama
                        if ($password == $repass) {
                            // Memeriksa apakah username sudah terdaftar
                            if (cek_nama($name, $koneksi) == 0) {
                                $pass = password_hash($password, PASSWORD_DEFAULT);
                                $query = "INSERT INTO users (username, name, email, password) VALUES ('$username', '$name', '$email', '$pass')";
                                $result = mysqli_query($koneksi, $query);

                                if ($result) {
                                    // Mengarahkan ke login-page setelah registrasi berhasil
                                    echo '<script>
                                            Swal.fire({
                                            icon: "success",
                                            title: "Register berhasil!",
                                            showConfirmButton: false,
                                            timer: 1500
                                            }).then(() => {
                                            window.location="login-page.php";
                                            });
                                    </script>';
                                    exit();
                                } else {
                                    $error = 'Username sudah terdaftar';
                                }
                            } else {
                                $validate = 'Password tidak sama !!';
                            }
                        }
                    }
                }

                // Fungsi untuk memeriksa apakah username sudah terdaftar
                function cek_nama($username, $koneksi)
                {
                    $nama = mysqli_real_escape_string($koneksi, $username);
                    $query = "SELECT * FROM users WHERE username = '$nama'";
                    if ($result = mysqli_query($koneksi, $query)) return mysqli_num_rows($result);
                }
                ?>
    
    <section class="register-container">
            <div class="form">

                <!-- Menampilkan pesan kesalahan jika terdapat error -->
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger" role="alert" style="width: 500px; position: fixed; top: 20px; left: 20px;">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <!-- Menampilkan pesan validasi -->
                <?php if (!empty($validate)) : ?>
                    <div class="alert alert-warning" role="alert" style="width: 500px; position: fixed; top: 20px; left: 20px;">
                        <?php echo $validate; ?>
                    </div>
                <?php endif; ?>


                

                <form action="register-page.php" method="POST">
                    <h2><b>Sign Up</b></h2>
                    <div class="input-name">
                        <input type="text" placeholder="Name" id="name" name="name" required>
                    </div>
                    <div class="input-email">
                        <input type="text" placeholder="Email" id="InputEmail" name="email" required>
                    </div>
                    <div class="input-username">
                        <input type="text" placeholder="Username" id="username" name="username" required>
                    </div>
                    <div class="input-password">
                        <input type="password" placeholder="Password" id="InputPassword" name="password" required>
                    </div>
                    <div class="input-repassword">
                        <input type="password" placeholder="Re-Password" id="InputRePassword" name="repassword" required>
                    </div>
                    
                    <button class="bn632-hover bn18" type="submit" name="submit">Register</button>
                    
                    <div class="href-register">
                        <p>Sudah punya account? <a href="login-page.php">Login</a></p>
                    </div>
                </form>
            </div>
            <div class="book-img">
                <img src="img/buku-flip.png" alt="Books Image"/>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>

</body>
</html>
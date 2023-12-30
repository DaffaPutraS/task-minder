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
    <section class="login-container">
        <div class="book-img">
            <img src="img/buku.png" alt="Books Image"/>
        </div>
        <div class="form">
            <form action="proses/login.php" method="POST">
                <h2>Sign In</h2>

                <input type="text" placeholder="Username" name="username" required>
                
                <input type="password" placeholder="Password" name="password" required>

                <div class="captcha">
                    <img src="proses/captcha.php" alt="gambar"><br>
                </div>

                <input type="text" placeholder="captcha" name="kodecaptcha" value="" maxlength="5" required>

                <button class="bn632-hover bn18" type="submit" name="submit" >login</button>
                
                <div class="href-register">
                    <p>Belum punya account? <a href="register-page.php">Register</a></p>
                </div>
            </form>

        </div>
    </section>
    
</body>
</html>
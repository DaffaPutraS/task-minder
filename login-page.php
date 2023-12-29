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
            <h2>Sign In</h2>
            <label for="nama"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="nama" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <img src="proses/captcha.php" alt="gambar"><br> <!-- tentukan letak script generate gambar -->
            <label for="kodecaptcha">Isikan Captcha</label>
            <input type="text" class="custom-form-control" placeholder="captcha" name="kodecaptcha" value="" maxlength="5" required>

            <button type="submit" class="btn">Login</button>
        </div>
    </section>
    
</body>
</html>
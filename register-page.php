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
</head>
<body>
    <!-- Navbar Section -->
    <div class="background">    
        <section class="register-container">
            <div class="form">
                <form action="proses/register.php" method="POST">
                    <h2><b>Sign Up</b></h2>
                    <div class="input-name">
                        <input type="text" placeholder="Name" id="name" name="name" required>
                    </div>
                    <div class="input-email">
                        <input type="email" placeholder="Email" id="InputEmail" name="email" required>
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
                    
                    <button class="bn632-hover bn18" type="submit" name="submit" >Register</button>
                    
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
</body>
</html>
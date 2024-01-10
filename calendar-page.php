<?php
//inisialisasi session 
session_start();

//mengecek username pada session
if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini'; 
    header('Location: login-page.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar | TaskMinder</title>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style-calendar.css">
    <!-- Icon Title Link-->
    <link rel="Icon" href="img/logo.png" type="image/x-icon">
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> 
            <i class='bx bx-menu' id="header-toggle"></i> 
        </div>
        <div class="header_btn_plus">
            <a href="add-page.php"><i class='bx bx-plus'></i></a>
        </div>
        <div class="header_img" id="profile-menu"> 
            <img src="img/profile-picture.png" alt=""> 
            <div class="profile-options">
                <a href="#" class="profile-option" id="profile-link"><?php echo $_SESSION['username']; ?></a>
            </div>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"><img src="img/logo.png" alt=""></i> <span class="nav_logo-name">TaskMinder</span> </a>
                <div class="nav_list"> 
                    <a href="dashboard.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i><span class="nav_name">Dashboard</span> </a> 
                    <a href="#" class="nav_link active"> <i class='bx bxs-calendar nav_icon'></i> <span class="nav_name">Calendar</span> </a> 
                </div>
            </div> 
            <a href="proses/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <div id='calendar'></div>


    <script src="js/calendar.js"></script>
    <script src="js/index.js"></script>
    <script src="js/dropdown-profile-index.js"></script>
</body>
</html>
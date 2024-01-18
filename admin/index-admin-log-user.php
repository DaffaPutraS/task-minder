<?php
require('../proses/koneksi.php');
session_start();

//mengecek username pada session
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login-page-admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Logs User</title>

    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <!-- Link Bootstrap JavaScript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">

    <!-- Link jQuery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    <!-- Link boxicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style-index-admin-log-user.css">

    <link rel="Icon" href="../img/logo.png" type="image/x-icon">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--- Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

</head>

<body id="body-pd">

    <!-- HEADER STARTS -->

    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <!-- <div class="header_btn_plus">
            <a href="add-page.php"><i class='bx bx-plus'></i></a>
        </div> -->
        <div class="header_img" id="profile-menu">
            <img src="../img/profile-picture.png" alt="">
            <div class="profile-options">
                <a href="#" class="profile-option" id="profile-link"><?php echo $_SESSION['username']; ?></a>
            </div>
        </div>
    </header>

    <!-- HEADER ENDS -->


    <!-- NAVBAR STARTS -->

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo"><img src="../img/logo.png" alt=""></i> <span class="nav_logo-name">ADMIN ONLY!</span> </a>
                <div class="nav_list">
                    <a href="index-admin.php" class="nav_link"> <i class='bx bxs-user'></i><span class="nav_name">Data User</span> </a>
                    <a href="#" class="nav_link active"> <i class='bx bxs-objects-vertical-bottom'></i><span class="nav_name">Logs user</span> </a>
                </div>
            </div>
            <a href="../proses/logout-admin.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <!-- NAVBAR ENDS -->



    <div class="main-page">
        <div class="container">
            <h2>Logs User</h2>
            <table id="logTable" class="custom-table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Timestamp</th>
                        <th>Status</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data JSON akan dimasukkan di sini menggunakan JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/alert-delete.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/dropdown-profile-dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Mendapatkan data JSON dari server
            $.ajax({
                url: '../logs/log.json',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Memasukkan data JSON ke dalam tabel
                    $.each(data, function(index, log) {
                        // Menambahkan baris baru ke dalam tabel dengan nilai dari data JSON
                        $('#logTable tbody').append(`
                        <tr>
                            <td>${log.username}</td>
                            <td>${log.timestamp}</td>
                            <td>${log.status}</td>
                            <td>${log.reason ? log.reason : '-'}</td>
                        </tr>
                    `);
                    });

                    // Inisialisasi DataTables dengan paginasi diatur ke 5
                    var dataTable = $('#logTable').DataTable({
                        "pageLength": 5,
                        "lengthMenu": [5, 10, 25, 50]
                    });
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>

</body>

</html>
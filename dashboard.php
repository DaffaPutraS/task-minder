<?php
//inisialisasi session 
session_start();

//mengecek username pada session
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login-page.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | TaskMinder</title>
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
    
    <!-- Link CSS -->
    <link rel="stylesheet" href="css/style-dashboard.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    
    <!-- Link JavaScript -->
    <script src="js/dashboard-scripts.js"></script>
    
    <!-- Icon Title Link-->
    <link rel="Icon" href="img/logo.png" type="image/x-icon">
</head>

<body id="body-pd">
    <!-- HEADER STARTS -->

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

    <!-- HEADER ENDS -->


    <!-- NAVBAR STARTS -->

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo"><img src="img/logo.png" alt=""></i> <span class="nav_logo-name">TaskMinder</span> </a>
                <div class="nav_list">
                    <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i><span class="nav_name">Dashboard</span> </a>
                    <a href="calendar-page.php" class="nav_link"> <i class='bx bxs-calendar nav_icon'></i> <span class="nav_name">Calendar</span> </a>
                </div>
            </div>
            <a href="proses/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    
    <!-- NAVBAR ENDS -->

    
    <!-- MAIN PAGE STARTS -->

    <div class="main-page">
        <!-- Logika untuk narik data menggunakan bahasa PHP -->
        <?php
        require("proses/koneksi.php");

        // Mengambil nilai user_id dari session
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

        // Mengambil data tugas (task) dari database berdasarkan username pengguna
        $retrieveData = mysqli_query($koneksi, "SELECT * FROM task WHERE username = '$username'");

        // Menentukan halaman saat ini (jika tidak diset, default ke halaman 1)
        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

        // Limit data per page
        $limit = 5;
        $limitStart = ($page - 1) * $limit;

        // Untuk ngisi nomor auto increment
        $no = $limitStart + 1;
        while ($row = mysqli_fetch_array($retrieveData)) {
        ?>
            <div class="card-container">
                <div class="card work">
                    <div class="img-section">
                        <img src="img/vektor-task.png" alt="">
                    </div>
                    <div class="card-desc">
                        <div class="card-header">
                            <div class="card-title"><?php echo $row['task_name']; ?></div>
                            <div class="toggle-dots">
                                <div class="card-menu" onclick="toggleDropdown(this)">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                    <div class="dropdown-content">
                                        <a href="edit-page.php?task_id=<?php echo $row['task_id']; ?>">Edit</a>
                                        <a href="detail-page.php?task_id=<?php echo $row['task_id']; ?>">Detail</a>
                                        <a href="proses/delete.php?task_id=<?php echo $row['task_id']; ?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-time"><?php echo $row['date']; ?></div>
                        <p class="recent" id="description"><?php echo $row['description']; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <!-- MAIN PAGE ENDS -->

    



    <script src="js/dropdown-dots.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/dropdown-profile-dashboard.js"></script>
    <script>
        // Fungsi untuk menampilkan/menyembunyikan dropdown menu
        function toggleDropdown(element) {
            element.querySelector('.dropdown-content').classList.toggle('show');
        }

        // Menanggapi klik di luar elemen dengan kelas 'card-menu' untuk menyembunyikan dropdown menu
        window.onclick = function(event) {
            // Mengambil semua elemen dengan kelas 'dropdown-content'
            if (!event.target.matches('.card-menu')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");

                // Menutup semua dropdown yang terbuka
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <script>
        // Function untuk memotong dan menambahkan titik-titik
        function truncateText(text, maxLength) {
            return text.length > maxLength ? text.substring(0, maxLength) + '...' : text;
        }

        // Memanggil function saat dokumen dimuat
        document.addEventListener('DOMContentLoaded', function () {
            // Mengambil semua elemen dengan kelas 'recent'
            var descriptions = document.querySelectorAll('.recent');

            // Iterasi melalui setiap elemen dan menerapkan fungsi truncateText
            descriptions.forEach(function (description) {
                // Menyimpan teks asli
                var originalText = description.textContent;
                // Memanggil fungsi truncateText untuk memotong teks (maksimum 38 karakter)
                var truncatedText = truncateText(originalText, 38);
                // Mengganti teks elemen dengan teks yang sudah dipotong
                description.textContent = truncatedText;

                // Optional: Tambahkan tooltip dengan teks lengkap
                if (originalText !== truncatedText) {
                    description.setAttribute('title', originalText);
                }
            });
        });
    </script>

</body>
</html>
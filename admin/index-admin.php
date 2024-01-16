<?php
require('../proses/koneksi.php');
session_start();

//mengecek username pada session
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login-page-admin.php');
}

// Check if the form is submitted for logging out
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
//     session_destroy();
//     header("Location: login-page-admin.php");
//     exit();
// }

// Check if the form is submitted for deleting a user
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_delete"])) {
//     $user_id_to_delete = $_POST["delete_user"];

//     // Perform the deletion query
//     $delete_query = "DELETE FROM users WHERE id_user = $user_id_to_delete";
//     $delete_result = mysqli_query($koneksi, $delete_query);

//     // Check if the query is successful
//     if ($delete_result) {
//         // Optional: Redirect to the same page after successful deletion
//         header("Location: index-admin.php");
//         exit();
//     } else {
//         // Handle the case where deletion fails
//         echo "Error deleting user: " . mysqli_error($koneksi);
//     }
// }

// Pagination settings
// $records_per_page = 5;
// $page = isset($_GET['page']) ? $_GET['page'] : 1;
// $offset = ($page - 1) * $records_per_page;

// // Search functionality
// $search_query = isset($_GET['search']) ? $_GET['search'] : '';
// $search_condition = $search_query ? "WHERE username LIKE '%$search_query%'" : '';

// // Query to fetch paginated and filtered data from the users table
// $query = "SELECT * FROM users $search_condition LIMIT $offset, $records_per_page";
// $result = mysqli_query($koneksi, $query);

// // Check if the query is successful
// if (!$result) {
//     die("Query failed: " . mysqli_error($koneksi));
// }
// Display the table
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
    <link rel="stylesheet" href="../css/style-index-admin.css">

    <link rel="Icon" href="../img/logo.png" type="image/x-icon">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                    <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i><span class="nav_name">Dashboard</span> </a>
                    <a href="index-admin-log-user.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i><span class="nav_name">Logs user</span> </a>
                </div>
            </div>
            <a href="../proses/logout-admin.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <!-- NAVBAR ENDS -->



    <!-- MAIN PAGE STARTS -->

    <div class="main-page">
    <!-- Container untuk form pencarian -->
    <div class="container">
        <h2>Data Users</h2>
        <!-- Form pencarian data berdasarkan ID Pembeli atau Nama -->
        <form action="" method="post">
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search by ID User atau Nama" name="searchTerm">
                <button class="search-btn" type="submit">Search</button>
            </div>
        </form>

        <!-- Tabel untuk menampilkan data -->
        <table class="custom-table" style="box-shadow: 0px 0px 0.8px 0px #000000;">
            <thead>
                <!-- Header kolom-kolom pada tabel -->
                <tr>
                    <th>ID User</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan data dari database -->
                <?php
                // Include file koneksi database
                include "../proses/koneksi.php";

                // Konfigurasi Pagination
                $limit = 5;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;

                // Query untuk mengambil data dengan pagination dan kata kunci pencarian
                $searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';
                $whereClause = '';

                if (!empty($searchTerm)) {
                    $whereClause = "WHERE id_user LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%'";
                }

                $query = "SELECT id_user, name, username, email FROM users
                        $whereClause
                        LIMIT $start, $limit";
                $result = $koneksi->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Menampilkan baris data dalam tabel
                        echo "<tr class='text-center'>";
                        echo "<td>" . $row["id_user"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo '<td>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row["id_user"] . '">Delete</a>
                            </td>';
                        echo "</tr>";

                        // Modal untuk delete
                        echo '<div class="modal fade" id="deleteModal' . $row["id_user"] . '" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Delete</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <a href="proses-delete.php?id_user=' . $row["id_user"] . '" class="btn btn-danger">Delete</a>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        
                    }
                } else {
                    // Menampilkan pesan jika data tidak ditemukan
                    echo "<tr><td colspan='7'>Data not found.</td></tr>";
                }

                $koneksi->close();
                ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <?php
        // Include file koneksi database
        include "../proses/koneksi.php";

        // Query untuk mendapatkan total data
        $queryTotal = "SELECT COUNT(id_user) as total FROM users";
        $resultTotal = $koneksi->query($queryTotal);
        $dataTotal = $resultTotal->fetch_assoc();
        $totalPages = ceil($dataTotal['total'] / $limit);

        // Menentukan halaman saat ini
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Menampilkan tombol "Previous" jika halaman saat ini lebih dari 1
        echo '<ul class="pagination justify-content-center">';
        if ($current_page > 1) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page - 1) . '">Previous</a></li>';
        }

        // Menampilkan nomor-nomor halaman
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li class="page-item ' . ($current_page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }

        // Menampilkan tombol "Next" jika halaman saat ini kurang dari total halaman
        if ($current_page < $totalPages) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page + 1) . '">Next</a></li>';
        }

        echo '</ul>';

        $koneksi->close();
        ?>
    </div>
    </div>

    <!-- MAIN PAGE ENDS -->






    

    <script src="../js/alert-delete.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/dropdown-profile-dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
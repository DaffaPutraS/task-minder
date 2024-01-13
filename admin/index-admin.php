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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_delete"])) {
    $user_id_to_delete = $_POST["delete_user"];

    // Perform the deletion query
    $delete_query = "DELETE FROM users WHERE id_user = $user_id_to_delete";
    $delete_result = mysqli_query($koneksi, $delete_query);

    // Check if the query is successful
    if ($delete_result) {
        // Optional: Redirect to the same page after successful deletion
        header("Location: index-admin.php");
        exit();
    } else {
        // Handle the case where deletion fails
        echo "Error deleting user: " . mysqli_error($koneksi);
    }
}

// Pagination settings
$records_per_page = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Search functionality
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$search_condition = $search_query ? "WHERE username LIKE '%$search_query%'" : '';

// Query to fetch paginated and filtered data from the users table
$query = "SELECT * FROM users $search_condition LIMIT $offset, $records_per_page";
$result = mysqli_query($koneksi, $query);

// Check if the query is successful
if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}
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
                </div>
            </div>
            <a href="../proses/logout-admin.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <!-- NAVBAR ENDS -->



    <!-- MAIN PAGE STARTS -->

    <div class="container">
        <h2>Data Users</h2>

        <!-- Search Bar -->
        <form class="search-bar" method="GET" action="">
            <input type="text" class="search-input" name="search" placeholder="Search by Username" value="<?php echo $search_query; ?>">
            <button type="submit" class="search-btn">Search</button>
        </form>

        <!-- Table for Displaying Data Users -->
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th> <!-- New column for delete button -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop to display data from the query result
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo "<td>{$row['id_user']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['username']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo '<td>
                            <form method="POST" action="">
                                <input type="hidden" name="delete_user" value="' . $row['id_user'] . '">
                                <button type="submit" name="submit_delete" class="delete-btn">Delete</button>
                            </form>
                            </td>';
                    echo '</tr>';
                }

                // Free the query result
                mysqli_free_result($result);

                // Pagination Query (move this before closing the connection)
                $pagination_query = "SELECT COUNT(*) FROM users $search_condition";
                $pagination_result = mysqli_query($koneksi, $pagination_query);
                $total_records = mysqli_fetch_array($pagination_result)[0];

                // Display pagination links
                ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= ceil($total_records / $records_per_page); $i++) {
                echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '"><a href="?page=' . $i . '&search=' . $search_query . '">' . $i . '</a></li>';
            }
            ?>
        </ul>

        <!-- Button to Logout -->
        <!-- <form method="POST" action="">
            <button type="submit" name="logout" class="logout-btn">Logout</button>
        </form> -->
    </div>

    <!-- MAIN PAGE ENDS -->






    <script src="../js/dashboard.js"></script>
    <script src="../js/dropdown-profile-dashboard.js"></script>
</body>

</html>
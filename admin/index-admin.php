<?php
require('../proses/koneksi.php');
session_start();



//mengecek username pada session
if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini'; 
    header('Location: login-page-admin.php');
}


// Check if the form is submitted for logging out
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    // Perform any necessary logout actions, such as destroying the session
    session_destroy();
    // Optional: Redirect to a login page or another destination after logout
    header("Location: login-page-admin.php");
    exit();
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
    <title>Data Users</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style-index-admin.css">
</head>
<body>

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
        <form method="POST" action="">
            <button type="submit" name="logout" class="logout-btn">Logout</button>
        </form>
    </div>

</body>
</html>

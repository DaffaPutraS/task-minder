<?php
// Inisialisasi session
session_start();

// Mengecek username pada session
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
    header('Location: login-page.php');
}

// Memeriksa koneksi database
require("proses/koneksi.php");

// Mengambil task_id dari parameter URL
$task_id = isset($_GET['task_id']) ? $_GET['task_id'] : null;

// Query untuk mendapatkan data tugas (task) berdasarkan task_id
$query = "SELECT * FROM task WHERE task_id = $task_id";
$result = mysqli_query($koneksi, $query);

// Mengambil data tugas
if ($row = mysqli_fetch_array($result)) {
    $task_name = $row['task_name'];
    $date = $row['date'];
    $description = $row['description'];
} else {
    // Redirect jika task tidak ditemukan
    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Detail | TaskMinder</title>
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
    <!-- Icon Title Link-->
    <link rel="Icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style-detail-page.css">
</head>

<body>

    <div class="main-page">
        <div class="card-container">
            <div class="detail-card">
                <h2><?php echo $task_name; ?></h2>
                <h3 class="date-card"><?php echo $date; ?></h3>
                <p><?php echo $description; ?></p>
                <a href="dashboard.php" class="acceptButton">Back to dashboard</a>
            </div>
        </div>
    </div>

</body>

</html>

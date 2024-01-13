<?php
include '../proses/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    $sql = "DELETE FROM users WHERE id_user = ?";
    
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_user);

    if ($stmt->execute()) {
        header("Location: index-admin.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid ID parameter.";
}

$koneksi->close();
?>

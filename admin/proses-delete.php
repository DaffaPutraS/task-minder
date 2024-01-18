<?php
// Memasukkan file koneksi.php untuk menghubungkan ke database
include '../proses/koneksi.php';

// Memeriksa metode permintaan (GET) dan apakah parameter 'id_user' sudah diset
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Menyiapkan query SQL untuk menghapus data user berdasarkan id_user
    $sql = "DELETE FROM users WHERE id_user = ?";
    
    // Menyiapkan statement SQL
    $stmt = $koneksi->prepare($sql);
    // Mengikat parameter id_user ke statement SQL
    $stmt->bind_param("i", $id_user);

    // Menjalankan statement SQL
    if ($stmt->execute()) {
        // Jika penghapusan berhasil, redirect ke halaman index-admin.php
        header("Location: index-admin.php");
        exit();
    } else {
        // Jika terjadi kesalahan, menampilkan pesan error
        echo "Error: " . $stmt->error;
    }

    // Menutup statement SQL
    $stmt->close();
} else {
    // Jika parameter id_user tidak valid atau tidak ada
    echo "Invalid ID parameter.";
}

// menutup koneksi database
$koneksi->close();
?>

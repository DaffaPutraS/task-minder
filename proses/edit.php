<?php 
    // Menghubungkan ke database
    require('koneksi.php');

    // Memeriksa apakah formulir telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Mengambil data inputan dari formulir
        $id = $_POST["task_id"];
        $username = $_POST["username"];
        $taskname = $_POST["task_name"];
        $date = $_POST["date"];
        $description = $_POST["description"];

        // Menjalankan query SQL untuk mengupdate data di database
        $query = "UPDATE task SET
                    username = '$username',
                    task_name = '$taskname',
                    date = '$date',
                    description = '$description'
                WHERE task_id = '$id'";

        // Menjalankan query dan menyimpan hasilnya
        $result = mysqli_query($koneksi, $query);

        // Memeriksa apakah update berhasil
        if ($result) {
            // Jika berhasil, tampilkan pesan sukses dan redirect ke halaman dashboard.php
            echo '<script>alert("Berhasil mengubah"); window.location="../dashboard.php"</script>';
            exit();
        } else {
            // Jika terjadi kesalahan, tampilkan pesan error dan kembali ke halaman edit-page.php
            echo '<script>alert("Maaf ada kesalahan ' . mysqli_error($koneksi) . ', sorry"); window.location="../edit-page.php"</script>';
        }
    }
?>

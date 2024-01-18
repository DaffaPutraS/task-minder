<?php
    require("koneksi.php"); // Menghubungkan ke database menggunakan file koneksi.php
    session_start();
    
    // require("login.php"); // Apakah login.php dibutuhkan? Tergantung pada logika aplikasi.

    // Mengambil nilai dari form menggunakan metode POST
    $username = $_POST["username"];
    $taskname = $_POST["task_name"];
    $date = $_POST["date"];
    $description = $_POST["description"];

    $accdata = true; // Variabel untuk memeriksa validitas data

    // Memeriksa apakah ada field yang kosong
    if (empty($username) || empty($taskname) || empty($date) || empty($description)) {
        $accdata = false;
        echo '<script>alert("Ada yang belum diisi tuh"); window.location="../add-page.php"</script>';
        exit();
    }

    // Menyimpan data ke database jika data valid
    if ($accdata) {
        mysqli_query($koneksi,"INSERT INTO task VALUES('', '$username','$taskname','$date','$description')");
        echo '<script>alert("Yeay berhasil nambah tugas, Semangat !"); window.location="../dashboard.php"</script>';
        exit();   
    } else {
        // Jika data tidak valid, menampilkan pesan dan mengarahkan kembali ke halaman add-page.php
        $accdata = false;
        echo '<script>alert("Cek lagi inputannya"); window.location="../add-page.php"</script>';
    }
?>

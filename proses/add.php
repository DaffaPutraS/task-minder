<?php
    require("koneksi.php"); // Connect ke DB
    session_start();
    
    require("login.php"); // Butuh login.php ? 


    // Ngambil data dari form
        // $userid = isset($_POST["user_id"]) ? $_POST["user_id"] : $user_id; (salahh)

    $userid = $_POST["user_id"];
    $taskname = $_POST["task_name"];
    $date = $_POST["date"];
    $description = $_POST["description"];

    $accdata = true;

    if (empty($userid) || empty($taskname) || empty($date) || empty($description)) {
        $accdata = false;
        echo '<script>alert("Ada yang belum diisi tuh"); window.location="../add-page.php"</script>';
        exit();
    }

// Input ke db
if ($accdata) {
    mysqli_query($koneksi,"INSERT INTO task VALUES('', '$userid','$taskname','$date','$description')");
    echo '<script>alert("Yeay berhasil nambah tugas, Semangat !"); window.location="../show-page.php"</script>';
    exit();   
} else {
    $accdata = false;
    echo '<script>alert("cek lagi inputannya"); window.location="../add-page.php"</script>';
}
?>
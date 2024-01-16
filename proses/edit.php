<?php 
    // Connect database
    require('koneksi.php');

    // Cek jika form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Mengambil data inputan 
        $id = $_POST["task_id"];
        $username = $_POST["username"];
        $taskname = $_POST["task_name"];
        $date = $_POST["date"];
        $description = $_POST["description"];

        // Update ke database
        $query = "UPDATE task SET
                    username = '$username',
                    task_name = '$taskname',
                    date = '$date',
                    description = '$description'
                WHERE task_id = '$id'";

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo '<script>alert("Berhasil mengubah"); window.location="../dashboard.php"</script>';
            exit();
        } else {
            echo '<script>alert("Maaf ada kesalahan "<?php . mysqli_error($koneksi); ?>", sorry"); window.location="../edit-page.php"</script>';
        }
    }
?>
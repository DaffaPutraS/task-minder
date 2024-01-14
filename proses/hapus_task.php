<?php 
     // Connect Ke DB
     require("koneksi.php");

     // Ngambil data dari view atau table
     $id = $_GET['task_id'];

     // menghapus dari database
    if ($id) {
        mysqli_query($koneksi,"DELETE FROM task WHERE task_id='$id'");
    }
?>
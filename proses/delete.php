<?php
    // Connect Ke DB
    require("koneksi.php");

    // Ngambil data dari view atau table
    $id = $_GET['task_id'];

    // menghapus dari database
    if ($id) {
        echo '<script>
                var confirmation = confirm("Apakah Anda yakin ingin menghapus task ini?");
                if (confirmation) {
                    // Hanya jika pengguna mengklik "OK"
                    // Lakukan penghapusan data
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Lakukan sesuatu setelah penghapusan selesai
                            alert("Task berhasil dihapus");
                            window.location="../dashboard.php";
                        }
                    };
                    xmlhttp.open("GET", "../proses/hapus_task.php?task_id=' . $id . '", true);
                    xmlhttp.send();
                } else {
                    // Jika pengguna membatalkan, arahkan ke halaman lain
                    window.location="../dashboard.php";
                }
            </script>';
    }
?>

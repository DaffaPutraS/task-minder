<?php
    session_start(); // Inisialisasi session 
    echo '<script>
        if(confirm("Apakah Anda yakin ingin logout?")) {
            window.location.href = "../admin/index-admin.php"; // Redirect jika user mengklik Cancel
        } else {
            window.location.href = "../admin/login-page-admin.php"; // Redirect jika user mengklik OK
            ' . session_destroy() . '; // Menghapus session
        }
    </script>';
?>

<?php
    session_start(); //inisialisasi session 
    if(session_destroy()) {//menghapus session 
        header("Location: ../admin/login-page-admin.php"); //jika berhasil maka akan diredirect ke file login-page.php
    }
?>
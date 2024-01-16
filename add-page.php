<?php 
    require("proses/koneksi.php"); //Membutuhkan koneksi buat dapet user_id
    session_start();
    

    //mengecek username pada session
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini'; 
        header('Location: login-page.php');
}

    // Mengambil nilai user_id dari session
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas | TaskMinder</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="css/style-add-page.css">

    <!--- Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Icon Title Link-->
    <link rel="Icon" href="img/logo.png" type="image/x-icon">

    <!-- Font Awesome CDN Link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    <div class="container">
        <div class="title">Tambahkan Tugas</div>
            <form action="proses/add.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <!-- <span class="details">Username</span> -->
                        <input type="hidden" name="username" value="<?php echo $username; ?>" readonly>
                    </div>
                    
                    <div class="input-box">
                        <span class="details">Nama Task</span>
                        <input type="text" name="task_name" placeholder="Nama Tugas broo" >
                    </div>

                    <div class="input-box">
                        <span class="details">Tanggal Deadline</span>
                        <input type="date" name="date" placeholder="Deadline Tugas" class="datepicker" >
                    </div>

                    <div class="input-box">
                        <span class="details">Deskripsi Tugas</span>
                        <textarea name="description" id="" cols="30" rows="10" placeholder="Deskripsi Tugas"></textarea>
                    </div>
                </div>    
                <div class="button">
                    <input type="submit" value="Tambah">
                </div>
            </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <?php 
      // require('js/datepicker.js');
    ?> -->
    <script>
    $( function() {
    $( ".datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd' // Format tanggal sesuai kebutuhan
        autoclose: true
        });
    });
    </script>
</body>
</html>
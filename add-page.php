<?php 
    require("proses/koneksi.php"); //Membutuhkan koneksi buat dapet user_id
    session_start();
    

    //mengecek username pada session
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini'; 
        header('Location: login-page.php');
}

    // Mengambil nilai user_id dari session
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page | TaskMinder</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="css/style-index.css">

    <!--- Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Icon Title Link-->
    <link rel="Icon" href="img/logo.png" type="image/x-icon">

    <!-- Font Awesome CDN Link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    <form action="proses/add.php" method="post">
        <h1 class="text-center display-4" >Add Page</h1>
        <table>
            <tr>
                <!-- <td>Id Akun</td> -->
                <td><input type="hidden" name="user_id" value="<?php echo $user_id; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Task</td>
                <td><input type="text" name="task_name" placeholder="Nama Tugas" ></td>
            </tr>
            <tr>
                <td>Tanggal Deadline</td>
                <td><input type="date" name="date" class="datepicker" ></td>
            </tr>
            <tr>
                <td>Deksripsi Tugas</td>
                <td><textarea name="description" id="deskripsi" cols="22" rows="5" placeholder="Deskripsi Tugas" ></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Save Data" ></td>
            </tr>
        </table>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <?php 
      // require('js/datepicker.js');
    ?> -->
    <script>
    $( function() {
    $( ".datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd' // Format tanggal sesuai kebutuhan
        autoclose: true;
        });
    });
    </script>
</body>
</html>
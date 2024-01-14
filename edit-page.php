<?
    session_start();

    //mengecek username pada session
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini'; 
        header('Location: login-page.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page | TaskMinder</title>

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
    <?php 
        require('proses/koneksi.php');
        
        // Ngambil user_id dari url
        $id = $_GET['task_id'];

        // Query untuk ngambil data
        $data = mysqli_query($koneksi, "SELECT * FROM task WHERE task_id='$id'");
        
        // Narik data pake query diatas
        while ($d = mysqli_fetch_array($data)) {
    ?>
    <h1 class="text-center display-4" >Edit Page</h1>
    <form action="proses/edit.php" method="post" >
        <table class="table table-hovered">
            <tr>
                <td class="col-md-5 form-label" >Id Akun</td>
                <td>
                    <input type="hidden" name="task_id" value="<?php echo $d['task_id']; ?>" >
                    <input type="text" name="username" placeholder="ID Akun" value="<?php echo $d['username']; ?>" readonly >
                </td>
            </tr>
            <tr>
                <td class="col-md-5 form-label">Nama Task</td>
                <td><input type="text" name="task_name" placeholder="Nama Tugas" value="<?php echo $d['task_name']; ?>" ></td>
            </tr>
            <tr>
                <td class="col-md-5 form-label">Tanggal Deadline</td>
                <td><input type="date" name="date" class="datepicker" ></td>
            </tr>
            <tr>
                <td class="col-md-5 form-label">Deksripsi Tugas</td>
                <td><textarea name="description" id="description" cols="22" rows="5" placeholder="Deskripsi Tugas" value="<?php echo $d['description']; ?>" ></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Edit Data" ></td>
            </tr>
        </table>
    </form>
    <?php 
    }
    ?>
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
<?php 
    require('proses/koneksi.php');
    
    // Ngambil user_id dari url
    $id = $_GET['task_id'];

    // Query untuk ngambil data
    $data = mysqli_query($koneksi, "SELECT * FROM task WHERE task_id='$id'");
    
    // Narik data pake query diatas
    while ($d = mysqli_fetch_array($data)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page | TaskMinder</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="css/style-edit-page.css">

    <!-- Icon Title Link-->
    <link rel="Icon" href="img/logo.png" type="image/x-icon">

    <!-- Font Awesome CDN Link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="title">Edit Tugas</div>
            <form action="proses/edit.php" method="post">
            <div class="user-details">
                <div class="input-box" style="display: none;">
                <input type="hidden" name="task_id" value="<?php echo $d['task_id']; ?>">
                    <label for="username" class="details">Id Akun</label>
                    <input type="text" name="username" placeholder="ID Akun" value="<?php echo $d['username']; ?>" readonly>
                </div>

                <div class="input-box">
                    <label for="task_name" class="details">Nama Tugas</label>
                    <input type="text" name="task_name" placeholder="Nama Tugas" value="<?php echo $d['task_name']; ?>" required>
                </div>

                <div class="input-box">
                    <label for="date" class="details">Tanggal Deadline</label>
                    <input type="date" name="date" class="datepicker" value="<?php echo $d['date']; ?>" required>
                </div>

                <div class="input-box">
                    <label for="description" class="details">Deskripsi Tugas</label>
                    <textarea name="description" id="description" rows="5" placeholder="Deskripsi Tugas" required><?php echo $d['description']; ?></textarea>
                </div>
            </div>
                
            <div class="button">
                <input type="submit" class="btn btn-primary" value="Edit Data">
            </div>
            </form>
        </div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<?php 
    }
?>

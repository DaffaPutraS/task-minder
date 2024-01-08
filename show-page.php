<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Page | TaskMinder</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="css/style-index.css">
    
    <!--- Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <!-- Icon Title Link-->
    <link rel="Icon" href="img/logo.png" type="image/x-icon">
    
    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
    .card {
        margin-top: 20px;
        --primary-clr: #1C204B;
        --dot-clr: #BBC0FF;
        --play: hsl(195, 74%, 62%);
        width: 200px;
        height: 170px;
        border-radius: 10px;
    }
    
    .card {
        font-family: "Arial";
        color: #fff;
        display: grid;
        cursor: pointer;
        grid-template-rows: 50px 1fr;
    }
    
    .card:hover .img-section {
        transform: translateY(1em);
    }
    
    .card-desc {
        border-radius: 10px;
        padding: 15px;
        position: relative;
        top: -10px;
        display: grid;
        gap: 10px;
        background: var(--primary-clr);
    }
    
    .card-time {
        font-size: 1.7em;
        font-weight: 500;
    }
    
    .img-section {
        transition: 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        background: hsl(195, 74%, 62%);
    }
    
    .card-header {
        display: flex;
        align-items: center;
        width: 100%;
    }
    
    .card-title {
        flex: 1;
        font-size: 0.9em;
        font-weight: 500;
    }
    
    .card-menu {
        display: flex;
        gap: 4px;
        margin-inline: auto;
    }
    
    .card svg {
        float: right;
        max-width: 100%;
        max-height: 100%;
    }
    
    .card .dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: var(--dot-clr);
    }
    
    .card .recent {
        line-height: 0;
        font-size: 0.8em;
    }
    </style>

</head>
<body>
    <h2 class="text-center display-4">Task List</h2>
        <table class="table table-bordered-hover" >
        <tr>
            <th>No</th>
            <th>ID_User</th>
            <th>Nama Task</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
        </tr>

        <?php
            require("proses/koneksi.php");

            $retrieveData = mysqli_query($koneksi, "SELECT * FROM task");
            
            $page= (isset($_GET['page']))? (int) $_GET['page'] : 1;

            // Limit data per page
            $limit = 5;
            $limitStart = ($page - 1) * $limit;
            
            // Untuk ngisi nomor auto increment
            $no = $limitStart +1;
            while ($row = mysqli_fetch_array($retrieveData)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['task_name'] ; ?></td>
            <td><?php echo $row['date'] ; ?></td>
            <td><?php echo $row['description'] ; ?></td>
            <td>
                <a href="edit-page.php?task_id=<?php echo $row['task_id']; ?>" class="btn btn-secondary" >✏️Edit</a>
                <a href="proses/delete.php?task_id=<?php echo $row['task_id']; ?>" class="me-3 btn btn-danger" >🗑️ Hapus</a>
            </td>
        </tr>
        </table>

    <div class="card work">
        <div class="img-section">
        <svg xmlns="http://www.w3.org/2000/svg" height="77" width="76"><path fill-rule="nonzero" fill="#3F9CBB" d="m60.91 71.846 12.314-19.892c3.317-5.36 3.78-13.818-2.31-19.908l-26.36-26.36c-4.457-4.457-12.586-6.843-19.908-2.31L4.753 15.69c-5.4 3.343-6.275 10.854-1.779 15.35a7.773 7.773 0 0 0 7.346 2.035l7.783-1.945a3.947 3.947 0 0 1 3.731 1.033l22.602 22.602c.97.97 1.367 2.4 1.033 3.732l-1.945 7.782a7.775 7.775 0 0 0 2.037 7.349c4.49 4.49 12.003 3.624 15.349-1.782Zm-24.227-46.12-1.891-1.892-1.892 1.892a2.342 2.342 0 0 1-3.312-3.312l1.892-1.892-1.892-1.891a2.342 2.342 0 0 1 3.312-3.312l1.892 1.891 1.891-1.891a2.342 2.342 0 0 1 3.312 3.312l-1.891 1.891 1.891 1.892a2.342 2.342 0 0 1-3.312 3.312Zm14.19 14.19a2.343 2.343 0 1 1 3.315-3.312 2.343 2.343 0 0 1-3.314 3.312Zm0 7.096a2.343 2.343 0 0 1 3.313-3.312 2.343 2.343 0 0 1-3.312 3.312Zm7.096-7.095a2.343 2.343 0 1 1 3.312 0 2.343 2.343 0 0 1-3.312 0Zm0 7.095a2.343 2.343 0 0 1 3.312-3.312 2.343 2.343 0 0 1-3.312 3.312Z"></path></svg>                </div>
        <div class="card-desc">
        <div class="card-header">
        <div class="card-title"><?php echo $row['task_name']; ?></div>
        <div class="card-menu">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        </div>
        <div class="card-time"><?php echo $row ['date'] ;?></div>
        <p class="recent"><?php echo $row ['description'];?></p>
    </div></div>
        <?php 
        }
        ?>
</body>
</html>
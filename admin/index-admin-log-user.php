<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Admin</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="css/style-monitoring.css">

    <!--- Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

</head>
<body>

    <div class="container">
        <h2>Monitoring Admin Log</h2>
        <table id="logTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Timestamp</th>
                    <th>Status</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data JSON akan dimasukkan di sini menggunakan JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            // Mendapatkan data JSON dari server
            $.ajax({
                url: '../logs/log.json',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Memasukkan data JSON ke dalam tabel
                    $.each(data, function (index, log) {
                        $('#logTable tbody').append(`
                            <tr>
                                <td>${log.username}</td>
                                <td>${log.timestamp}</td>
                                <td>${log.status}</td>
                                <td>${log.reason ? log.reason : '-'}</td>
                            </tr>
                        `);
                    });

                    // Inisialisasi DataTables
                    $('#logTable').DataTable();
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <link rel="icon" href="../images/Sispe.png" />
</head>
<body>



<div class="container basic-1 mt-5">
    <h2>Manajemen Event</h2>
    <a href="add_event.php" class="btn btn-primary">Tambah Event</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Event</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('../includes/config.php');
            $result = $conn->query("SELECT * FROM events");
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['event_name']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['event_date']}</td>
                        <td>
                            <a href='edit_event.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                            <a href='delete_event.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>


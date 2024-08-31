<?php include('../includes/config.php');?>

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

<div class="container">

<div class="container mt-5">
    <h2>Kelola Event</h2>
    <a href="add_event.php" class="btn btn-primary mb-3">Tambah Event Baru</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Event</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM events");
            if($result->num_rows > 0) {
                $no = 1;
                while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['event_name']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['event_date']; ?></td>
                <td>
                    <a href="edit_event.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete_event.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus event ini?')">Hapus</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Belum ada event yang terdaftar</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

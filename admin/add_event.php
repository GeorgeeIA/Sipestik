<?php 
include('../includes/config.php');

if(isset($_POST['submit'])) {
    $event_name = $_POST['event_name'];
    $location = $_POST['location'];
    $event_date = $_POST['event_date'];
    $description = $_POST['description'];
    
    $image = $_FILES['image']['name'];
    $target = "../assets/images/" . basename($image);

    $sql = "INSERT INTO events (event_name, location, event_date, image, description) 
            VALUES ('$event_name', '$location', '$event_date', '$image', '$description')";

    if($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        header("Location: manage_events.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

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

<div class="container my-5">
    <h2>Tambah Event Baru</h2>
    <form method="post" action="add_event.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="event_name">Nama Event:</label>
            <input type="text" class="form-control" id="event_name" name="event_name" required>
        </div>
        <div class="form-group">
            <label for="location">Lokasi:</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="event_date">Tanggal Event:</label>
            <input type="date" class="form-control" id="event_date" name="event_date" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar Event:</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Tambah Event</button>
    </form>
</div>

</body>
</html>

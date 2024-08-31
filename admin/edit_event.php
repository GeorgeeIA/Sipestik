<?php 
include('../includes/config.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM events WHERE id=$id");

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        header("Location: manage_events.php");
        exit();
    }
}

if(isset($_POST['submit'])) {
    $event_name = $_POST['event_name'];
    $location = $_POST['location'];
    $event_date = $_POST['event_date'];
    $description = $_POST['description'];

    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target = "../assets/images/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $image = $row['image'];
    }

    $sql = "UPDATE events SET event_name='$event_name', location='$location', event_date='$event_date', image='$image', description='$description' WHERE id=$id";

    if($conn->query($sql) === TRUE) {
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
    <h2>Edit Event</h2>
    <form method="post" action="edit_event.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="event_name">Nama Event:</label>
            <input type="text" class="form-control" id="event_name" name="event_name" value="<?php echo $row['event_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="location">Lokasi:</label>
            <input type="text" class="form-control" id="location" name="location" value="<?php echo $row['location']; ?>" required>
        </div>
        <div class="form-group">
            <label for="event_date">Tanggal Event:</label>
            <input type="date" class="form-control" id="event_date" name="event_date" value="<?php echo $row['event_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar Event:</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <img src="../assets/images/<?php echo $row['image']; ?>" alt="<?php echo $row['event_name']; ?>" class="mt-3" width="200">
        </div>
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" id="description" name="description" rows="5" required><?php echo $row['description']; ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>

</body>
</html>

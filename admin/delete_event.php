<?php
include('../includes/config.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Hapus entri terkait di tabel bookings terlebih dahulu
    $deleteBookings = "DELETE FROM bookings WHERE event_id=$id";
    
    if($conn->query($deleteBookings) === TRUE) {
        // Setelah entri terkait dihapus, hapus event dari tabel events
        $deleteEvent = "DELETE FROM events WHERE id=$id";
        
        if($conn->query($deleteEvent) === TRUE) {
            // Redirect ke halaman manage_events.php setelah berhasil dihapus
            header("Location: manage_events.php");
            exit();
        } else {
            echo "Error deleting event: " . $conn->error;
        }
    } else {
        echo "Error deleting bookings: " . $conn->error;
    }
}
?>

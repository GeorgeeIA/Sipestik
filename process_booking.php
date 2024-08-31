<?php 
include('includes/config.php');
include('includes/fpdf/fpdf.php'); // Jika Anda menggunakan FPDF untuk membuat PDF

if(isset($_POST['submit'])) {
    $event_id = $_POST['event_id'];
    $buyer_name = $_POST['buyer_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $id_card_number = $_POST['id_card_number'];
    $ticket_code = strtoupper(substr(md5(uniqid(rand(), true)), 0, 10));

    // Menyimpan data pembeli ke database
    $sql = "INSERT INTO bookings (event_id, buyer_name, phone_number, email, id_card_number, ticket_code) 
            VALUES ('$event_id', '$buyer_name', '$phone_number', '$email', '$id_card_number', '$ticket_code')";

    if($conn->query($sql) === TRUE) {
        // Buat objek PDF
        $pdf = new FPDF();

        // Ukuran kertas yang dapat disesuaikan
        $pdf_width = 70; // Lebar kertas dalam milimeter
        $pdf_height = 100; // Tinggi kertas dalam milimeter
        $pdf->AddPage('P', array($pdf_width, $pdf_height));
        
        // Set font
        $pdf->SetFont('Arial', '', 12);

        // Tambahkan konten
        $pdf->Cell(0, 10, 'Tiket Anda', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Nama: ' . $buyer_name, 0, 1);
        $pdf->Cell(0, 10, 'Kode Tiket: ' . $ticket_code, 0, 1);
        $pdf->Cell(0, 10, 'Scan Barcode:', 0, 1);

        // Output ke file
        $pdf_output_path = 'assets/tickets/' . $ticket_code . '.pdf';
        $pdf->Output('F', $pdf_output_path);

        // Send email with attachment
        $to = $email;
        $subject = "Tiket Event Anda";
        $message = "Terima kasih telah memesan tiket. Silakan lihat lampiran untuk tiket PDF Anda.";
        $headers = "From: no-reply@example.com";
        $attachment = chunk_split(base64_encode(file_get_contents('assets/tickets/' . $ticket_code . '.pdf')));
        $boundary = md5(time());

        $headers .= "\r\nMIME-Version: 1.0";
        $headers .= "\r\nContent-Type: multipart/mixed; boundary=\"".$boundary."\"";
        $message .= "\r\n--".$boundary."\r\n";
        $message .= "Content-Type: application/pdf; name=\"".$ticket_code.".pdf\"\r\n";
        $message .= "Content-Transfer-Encoding: base64\r\n";
        $message .= "Content-Disposition: attachment; filename=\"".$ticket_code.".pdf\"\r\n\r\n";
        $message .= $attachment."\r\n";
        $message .= "--".$boundary."--";

        mail($to, $subject, $message, $headers);

        // Redirect to halaman terima kasih
        header("Location: thank_you.php?code=$ticket_code&name=$buyer_name");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

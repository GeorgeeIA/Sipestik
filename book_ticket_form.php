<?php 
include('includes/config.php'); // Koneksi database

if(isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    $result = $conn->query("SELECT * FROM events WHERE id=$event_id");

    if($result->num_rows > 0) {
        $event = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- SEO Meta Tags -->
    <meta name="description" content="Tiket Event adalah platform untuk memesan tiket acara dengan mudah." />
    <meta name="author" content="George Isaiah Abiyoso" />

    <!-- Website Title -->
    <title>Tiket Event</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/fontawesome-all.css" rel="stylesheet" />
    <link href="css/swiper.css" rel="stylesheet" />
    <link href="css/magnific-popup.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Favicon  -->
    <link rel="icon" href="images/Sispe.png" />
</head>
<body data-spy="scroll" data-target=".fixed-top">
    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top mb-5" style="background-color: #0b8494">
        <div class="container">
            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="index.html"><img src="images/SVG/Asset 2.svg" alt="alternative" /></a>

            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="index.html">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="about.html">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll active" href="book_ticket.html">PESAN</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end of container -->
    </nav>
    <!-- end of navbar -->
    <!-- end of navigation -->

    <!-- Form -->
    <div class="container basic-1 mt-5">
        <h2>Pesan Tiket untuk <?php echo htmlspecialchars($event['event_name']); ?></h2>
        <form method="post" action="process_booking.php">
            <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($event['id']); ?>">
            <div class="form-group">
                <label for="buyer_name">Nama Pembeli:</label>
                <input type="text" class="form-control" id="buyer_name" name="buyer_name" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Nomor Telepon:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="id_card_number">NIK KTP:</label>
                <input type="text" class="form-control" id="id_card_number" name="id_card_number" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Pesan Tiket</button>
            <a href="event_detail.php?id=<?php echo htmlspecialchars($event['id']); ?>" class="btn btn-danger" style="text-decoration:none">Batal</a>
        </form>
    </div>

    <?php
        } else {
            echo "<div class='alert alert-danger mt-5'>Event tidak ditemukan.</div>";
        }
    } else {
        echo "<div class='alert alert-danger mt-5'>Event tidak ditemukan.</div>";
    }
    ?>
    <!-- end of Form -->

    <!-- Footer -->

    <!-- Copyright -->
    <div class="copyright" style="background-color: #0b8494;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small" style="border-top: 1px solid white;">
                        Copyright © 2024
                        <a href="https://inovatik.com">Sipestik All Rights Reserved.</a><br />
                        <a href="https://themewagon.com" target="_blank">George Isaiah Abiyoso</a>
                    </p>
                </div>
                <!-- end of col -->
            </div>
            <!-- enf of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of copyright -->

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script>
    <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script>
    <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script>
    <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script>
    <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script>
    <!-- Custom scripts -->
</body>
</html>

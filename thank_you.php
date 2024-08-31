<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- SEO Meta Tags -->
    <meta name="description" content="Tiket Event adalah platform untuk memesan tiket acara dengan mudah." />
    <meta name="author" content="George Isaiah Abiyoso" />

    <!-- Website Title -->
    <title>Sipestik.</title>

    <!-- Styles -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
      rel="stylesheet"
    />
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
    <nav
      class="navbar navbar-expand-lg navbar-custom fixed-top"
      style="background-color: #0b8494"
    >
      <div class="container">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Tivo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"
          ><img src="images/SVG/Asset 2.svg" alt="alternative"
        /></a>

        <!-- Mobile Menu Toggle Button -->
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarsExampleDefault"
          aria-controls="navbarsExampleDefault"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-awesome fas fa-bars"></span>
          <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link page-scroll" href="index.html"
                >HOME <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="about.html">ABOUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll  active" href="book_ticket.php">PESAN</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- end of container -->
    </nav>
    <!-- end of navbar -->
    <!-- end of navigation -->

<div class="container basic-1 mt-5 text-center">
    <h2>Terima Kasih!</h2>
    <p>Tiket Anda telah berhasil dipesan. Kode tiket Anda adalah <strong><?php echo $_GET['code']; ?></strong></p>
    <p>Nama Pembeli: <strong><?php echo $_GET['name']; ?></strong></p>
    <p>Silakan cek email Anda untuk menerima tiket dalam bentuk PDF.</p>
    <a href="index.html" class="btn btn-primary mt-3">Kembali ke Beranda</a>
</div>

<?php include('includes/footer.php'); ?>

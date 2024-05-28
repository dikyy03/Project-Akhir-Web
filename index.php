<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: masuk.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nab Water</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        .bg {
            background-image: url('img/background.jpeg'); 
            background-size: cover; 
            background-position: center; 
            color: white; 
            padding: 20px; 
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            height: 70vh;
        }

        
    </style>
  </head>

  <body>
    <!-- Header -->
        <?php include "header.php";?>
    <!-- End Header -->

<div class="container-lg">
  <div class="row">

    <!-- Content -->
    <?php
    if (isset($_GET['x']) && $_GET['x']=='home'){
      include "home.php";
    } elseif (isset($_GET['x']) && $_GET['x']=='pemesanan'){
      include "pemesanan.php";
    } elseif (isset($_GET['x']) && $_GET['x']=='info_pesanan'){
      include "info_pesanan.php";
    } elseif (isset($_GET['x']) && $_GET['x']=='masuk'){
      include "proses_masuk.php"; 
    } else {
      include "home.php";
    }
    ?>
    <!-- End Content -->
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  
</html>
<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:login');
    exit();
}

include('koneksi.php');

$username = $_SESSION['username'];
$query = "SELECT * FROM tbl_user WHERE username = '$username'";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['status'] = $row['status'];
} else {
    $_SESSION['status'] = 'unknown';
}

$allowed_pages_admin = ['daftar_menu', 'daftar_pesanan', 'daftar_user'];
$default_admin_page = 'daftar_menu';

$page = isset($_GET['x']) ? $_GET['x'] : 'home';

if ($_SESSION['status'] == 'admin' && !in_array($page, $allowed_pages_admin)) {
    $page = $default_admin_page;
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
</head>

<body>
    <!-- Header -->
    <?php include "header.php"; ?>
    <!-- End Header -->

    <!-- Content -->
    <?php
    include $page . ".php";
    ?>
    <!-- End Content -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

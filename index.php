<?php
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "home.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'menu') {
    $page = "menu.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'riwayat_pesanan') {
    $page = "riwayat_pesanan.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pengiriman') {
    $page = "pengiriman.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'daftar_menu') {
    $page = "daftar_menu.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'daftar_pesanan') {
    $page = "daftar_pesanan.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'daftar_user') {
    $page = "daftar_user.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php"; 
} elseif (isset($_GET['x']) && $_GET['x'] == 'register') {
    include "register.php"; 
} else {
    $page = "home.php";
    include "main.php";
}

<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_menu = $_POST['id_menu'];

    $query = "DELETE FROM tbl_daftar_menu WHERE id_menu='$id_menu'";

    if ($connection->query($query) === TRUE) {
        echo 'success';
    } else {
        echo 'error: ' . $connection->error;
    }
}
?>

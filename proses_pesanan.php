<?php
session_start();
include "koneksi.php";

// Tangkap data dari form
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$keterangan = $_POST['keterangan']; // tambahan keterangan
$jumlah_pesanan = $_POST['jumlah_pesanan'];
$id_menu = $_POST['id_menu'];

// Query untuk mendapatkan harga menu
$query_harga_menu = "SELECT harga FROM tbl_daftar_menu WHERE id_menu = '$id_menu'";
$result_harga_menu = $connection->query($query_harga_menu);

if ($result_harga_menu->num_rows > 0) {
    $row_harga_menu = $result_harga_menu->fetch_assoc();
    $harga_menu = $row_harga_menu['harga'];

    // Hitung total harga
    $total_harga = $jumlah_pesanan * $harga_menu;

    // Query untuk memasukkan pesanan ke dalam tabel tbl_pesanan
    $sql = "INSERT INTO tbl_pesanan (id_menu, username, alamat, keterangan, jumlah_pesanan, total_harga) 
            VALUES ('$id_menu', '$username', '$alamat', '$keterangan', '$jumlah_pesanan', '$total_harga')";

    if ($connection->query($sql) === TRUE) {
        echo '<script>alert("Pesanan berhasil diproses."); window.location.href = "menu";</script>';
    } else {
        echo '<script>alert("Error: ' . $sql . '\\n' . $connection->error . '"); window.history.back();</script>';
    }
} else {
    echo '<script>alert("Menu tidak ditemukan."); window.history.back();</script>';
}

$connection->close();
?>

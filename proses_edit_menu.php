<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_menu = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];
    $stok = $_POST['stok'];

    $query = "UPDATE tbl_daftar_menu SET nama_menu = ?, harga = ?, keterangan = ?, stok = ? WHERE id_menu = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ssssi", $nama_menu, $harga, $keterangan, $stok, $id_menu);

    if ($stmt->execute()) {
        echo "Menu berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui menu: " . $connection->error;
    }

    $stmt->close();
    $connection->close();

    header("Location: daftar_menu");
    exit();
}
?>

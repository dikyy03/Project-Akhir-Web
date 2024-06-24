<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_menu = $_POST['id_menu'];
    $jumlah_pesanan = $_POST['jumlah_pesanan'];

    // Validasi jumlah pesanan (misalnya tidak boleh kurang dari 1)
    if ($jumlah_pesanan < 1) {
        echo "Jumlah pesanan harus lebih dari 0.";
        exit;
    }

    // Query untuk mendapatkan harga menu
    $query_harga = "SELECT harga FROM tbl_daftar_menu WHERE id_menu = ?";
    $stmt_harga = $connection->prepare($query_harga);
    $stmt_harga->bind_param("i", $id_menu);
    $stmt_harga->execute();
    $result_harga = $stmt_harga->get_result();

    if ($result_harga->num_rows > 0) {
        $row_harga = $result_harga->fetch_assoc();
        $harga_per_menu = $row_harga['harga'];
    } else {
        echo "Menu tidak ditemukan.";
        exit;
    }

    // Hitung total harga
    $total_harga = $harga_per_menu * $jumlah_pesanan;

    // Query untuk memasukkan pesanan ke dalam database
    $query = "INSERT INTO tbl_pesanan (id_menu, jumlah_pesanan, total_harga) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("iid", $id_menu, $jumlah_pesanan, $total_harga);

    if ($stmt->execute()) {
        echo "Pesanan berhasil disimpan.";
    } else {
        echo "Gagal menyimpan pesanan: " . $stmt->error;
    }

    $stmt_harga->close();
    $stmt->close();
    $connection->close();
}
?>

<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaMenu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];
    $stok = $_POST['stok'];

    // Proses upload gambar
    $gambarName = $_FILES['gambar']['name'];
    $gambarTmp = $_FILES['gambar']['tmp_name'];
    $gambarSize = $_FILES['gambar']['size'];
    $gambarError = $_FILES['gambar']['error'];

    // Cek apakah ada file yang diupload
    if ($gambarError === 0) {
        $gambarDestination = 'img/' . $gambarName; // Direktori penyimpanan gambar

        // Pindahkan file gambar ke direktori tujuan
        if (move_uploaded_file($gambarTmp, $gambarDestination)) {
            // Query SQL untuk memasukkan data ke database
            $query = "INSERT INTO tbl_daftar_menu (nama_menu, harga, keterangan, gambar, stok) 
                      VALUES ('$namaMenu', '$harga', '$keterangan', '$gambarDestination', '$stok')";

            if ($connection->query($query) === TRUE) {
                echo '<script>
                alert("Menu baru berhasil ditambahkan");
                window.location.href = "daftar_menu";
            </script>';
            } else {
                echo '<script>
        alert("Menu gagal ditambahkan, Silahkan coba lagi");
        window.location.href = "daftar_menu";
    </script>';
            }
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        echo "Error saat mengunggah gambar.";
    }

    $connection->close();
}

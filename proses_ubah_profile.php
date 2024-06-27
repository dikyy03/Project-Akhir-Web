<?php
session_start();
include('koneksi.php');

// Ambil data dari form
$username = $_SESSION['username'];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];

// Perbarui profile di database
$update_query = "UPDATE tbl_user SET nama_lengkap = ?, email = ?, nomor_telepon = ?, alamat = ? WHERE username = ?";
$stmt = $connection->prepare($update_query);
$stmt->bind_param("sssss", $nama_lengkap, $email, $nomor_telepon, $alamat, $username);

if ($stmt->execute()) {
    echo "<script>
            alert('Profile berhasil diperbarui.');
            window.location.href='.'; 
          </script>";
} else {
    echo "<script>
            alert('Error memperbarui profile: " . $stmt->error . "');
            window.history.back();
          </script>";
}

// Tutup statement dan koneksi
$stmt->close();
$connection->close();
?>

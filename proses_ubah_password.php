<?php
session_start();
include('koneksi.php');

// Ambil data dari form
$username = $_SESSION['username'];
$password_lama = md5($_POST['password_lama']);
$password_baru = md5($_POST['password_baru']);
$konfirmasi_password_baru = md5($_POST['konfirmasi_password_baru']);

// Periksa apakah password lama benar
$query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password_lama'";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    // Periksa apakah password baru dan konfirmasi password baru cocok
    if ($password_baru === $konfirmasi_password_baru) {
        // Perbarui password di database
        $update_query = "UPDATE tbl_user SET password = '$password_baru' WHERE username = '$username'";
        if ($connection->query($update_query) === TRUE) {
            echo "<script>
                    alert('Password berhasil diperbarui.');
                    window.location.href='.'; 
                  </script>";
        } else {
            echo "<script>
                    alert('Error memperbarui password: " . $connection->error . "');
                    window.history.back();
                  </script>";
        }
    } else {
        echo "<script>
                alert('Password baru dan konfirmasi password tidak cocok.');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('Password lama salah.');
            window.history.back();
          </script>";
}

// Tutup koneksi
$connection->close();
?>

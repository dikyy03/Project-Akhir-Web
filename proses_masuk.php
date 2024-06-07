<?php
session_start();
require 'koneksi.php';

if (empty($_POST['email_or_username']) || empty($_POST['password'])) {
    echo "<script>
    alert('Silakan masukkan email/username dan password.');
    window.location='masuk.php';
    </script>";
    exit();
}

$email_or_username = $_POST['email_or_username'];
$password = $_POST['password'];

$sql = "SELECT * FROM pengguna WHERE email=? OR username=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email_or_username, $email_or_username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("location: index.php");
    } else {
        echo "<script>
        alert('Password salah. Silakan coba lagi.');
        window.location='masuk.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Pengguna tidak ditemukan. Silakan coba lagi.');
    window.location='masuk.php';
    </script>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

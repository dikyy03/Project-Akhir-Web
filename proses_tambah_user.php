<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_akhir"; // Nama database Anda


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = md5("12345"); 
$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';

$sql_check_username = "SELECT * FROM tbl_user WHERE username='$username'";
$result = $conn->query($sql_check_username);

if ($result->num_rows > 0) {
    echo '<script>
        alert("Username sudah terdaftar. Silakan gunakan username lain.");
        window.location.href = "daftar_user";
    </script>';
    $conn->close();
    exit;
}


$query = "INSERT INTO tbl_user (nama_lengkap, username, status, nomor_telepon, email, password, alamat) VALUES ('$nama_lengkap', '$username', '$status', '$nomor_telepon', '$email', '$password', '$alamat')";
if ($conn->query($query) === TRUE) {
    echo '<script>
        alert("User baru berhasil ditambahkan");
        window.location.href = "daftar_user";
    </script>';
} else {
    echo '<script>
        alert("Data gagal ditambahkan: ' . $conn->error . '");
        window.location.href = "daftar_user";
    </script>';
}

$conn->close();
?>

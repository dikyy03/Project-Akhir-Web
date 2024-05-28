<?php
include 'koneksi.php';

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username = sanitize_input($_POST['username']);
$email = sanitize_input($_POST['email']);
$no_telepon = sanitize_input($_POST['no_telepon']);
$alamat = sanitize_input($_POST['alamat']);
$password = sanitize_input($_POST['password']);

// Validasi input
if (empty($username) || empty($email) || empty($no_telepon) || empty($alamat) || empty($password)) {
    echo "<script>
    alert('Semua kolom harus diisi.');
    window.location='daftar.php';
    </script>";
    exit();
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Cek duplikat email atau username
$sql_check = "SELECT * FROM pengguna WHERE email=? OR username=?";
$stmt_check = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt_check, "ss", $email, $username);
mysqli_stmt_execute($stmt_check);
$result_check = mysqli_stmt_get_result($stmt_check);

if (mysqli_num_rows($result_check) > 0) {
    echo "<script>
    alert('Email atau Username sudah terdaftar.');
    window.location='daftar.php';
    </script>";
    exit();
}

// Masukkan pengguna baru
$sql_insert = "INSERT INTO pengguna (username, email, no_telepon, alamat, password) VALUES (?, ?, ?, ?, ?)";
$stmt_insert = mysqli_prepare($conn, $sql_insert);
mysqli_stmt_bind_param($stmt_insert, "sssss", $username, $email, $no_telepon, $alamat, $hashed_password);

if (mysqli_stmt_execute($stmt_insert)) {
    echo "<script>
    alert('Pendaftaran berhasil. Silakan masuk.');
    window.location='masuk.php';
    </script>";
} else {
    echo "Pendaftaran gagal: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt_check);
mysqli_stmt_close($stmt_insert);
mysqli_close($conn);
?>

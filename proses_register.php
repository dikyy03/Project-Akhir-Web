<?php
session_start();
include('koneksi.php');

$nama_lengkap = $_POST['nama_lengkap'];
$username     = $_POST['username'];
$email        = $_POST['email'];
$alamat       = $_POST['alamat'];
$nomor_telepon = $_POST['nomor_telepon'];
$password     = md5($_POST['password']);

//query insert data ke dalam database
$query = "INSERT INTO tbl_user (nama_lengkap, username, email, alamat, nomor_telepon, password) VALUES ('$nama_lengkap', '$username', '$email', '$alamat', '$nomor_telepon', '$password')";        

if($connection->query($query)) {
    $_SESSION['username'] = $username;
    echo "success";
} else {
    echo "error";
}

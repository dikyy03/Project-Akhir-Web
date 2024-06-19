<?php
session_start();
include('koneksi.php');

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
$result = $connection->query($query);

if($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    echo "success";
} else {
    echo "error";
}

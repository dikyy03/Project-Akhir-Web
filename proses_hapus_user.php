<?php
include "koneksi.php";

if (isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];

    $query = "DELETE FROM tbl_user WHERE id_user = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $id_user);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $connection->close();
}
?>

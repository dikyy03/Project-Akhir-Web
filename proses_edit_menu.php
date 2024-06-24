<?php
$no = 1;
$sql = "SELECT * FROM tbl_daftar_menu";
$result = $connection->query($sql);
while ($row = $result->fetch_assoc()) {
?>
<tr class="text-center">
    <td><?= $no++; ?></td>
    <td><?= $row['nama_menu']; ?></td>
    <td>
        <img src="img/<?= $row['gambar']; ?>" class="img-fluid" alt="<?= $row['nama_menu']; ?>" style="max-height: 100px;">
    </td>
    <td><?= $row['keterangan']; ?></td>
    <td><?= $row['harga']; ?></td>
    <td><?= $row['stok']; ?></td>
    <td>
        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit_menu"
            data-id="<?= $row['id']; ?>"
            data-nama_menu="<?= $row['nama_menu']; ?>"
            data-keterangan="<?= $row['keterangan']; ?>"
            data-harga="<?= $row['harga']; ?>"
            data-stok="<?= $row['stok']; ?>"
            data-gambar="<?= $row['gambar']; ?>">Edit</button>
        <a href="proses_hapus_menu.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
    </td>
</tr>
<?php
}
?>

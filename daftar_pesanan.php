<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pesanan = $_POST['id_pesanan'];
    $action = $_POST['action'];

    if ($action == 'accept') {
        $query = "UPDATE tbl_pesanan SET status='accepted' WHERE id_pesanan=?";
    } elseif ($action == 'reject') {
        $query = "UPDATE tbl_pesanan SET status='rejected' WHERE id_pesanan=?";
    }

    if (isset($query)) {
        $stmt = $connection->prepare($query);
        $stmt->bind_param('i', $id_pesanan);
        $stmt->execute();
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg mt-2">
            <div class="card">
                <div class="card-header">
                    Daftar Pesanan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Waktu Pesan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT p.id_pesanan, p.username, m.nama_menu, p.alamat, p.jumlah_pesanan, p.total_harga, p.waktu_pemesanan, p.status 
                                          FROM tbl_pesanan p 
                                          JOIN tbl_daftar_menu m ON p.id_menu = m.id_menu
                                          JOIN tbl_user u ON p.username = u.username";

                                $result = $connection->query($query);

                                if ($result->num_rows > 0) {
                                    $no = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><?= $row['username'] ?></td>
                                            <td><?= $row['nama_menu'] ?></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td><?= $row['jumlah_pesanan'] ?></td>
                                            <td><?= $row['total_harga'] ?></td>
                                            <td><?= $row['waktu_pemesanan'] ?></td>
                                            <td><?= ucfirst($row['status']) ?></td>
                                            <td>
                                                <?php if ($row['status'] == 'pending') { ?>
                                                    <form action="daftar_pesanan" method="POST" style="display:inline-block;">
                                                        <input type="hidden" name="id_pesanan" value="<?= $row['id_pesanan'] ?>">
                                                        <input type="hidden" name="action" value="accept">
                                                        <button type="submit" class="btn btn-success btn-sm">Terima</button>
                                                    </form>
                                                    <form action="daftar_pesanan" method="POST" style="display:inline-block;">
                                                        <input type="hidden" name="id_pesanan" value="<?= $row['id_pesanan'] ?>">
                                                        <input type="hidden" name="action" value="reject">
                                                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                                    </form>
                                                <?php } elseif ($row['status'] == 'accepted') { ?>
                                                    <span class="badge bg-success">Diterima</span>
                                                <?php } elseif ($row['status'] == 'rejected') { ?>
                                                    <span class="badge bg-danger">Ditolak</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="9">Tidak ada pesanan</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

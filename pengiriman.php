<?php
include "koneksi.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg mt-2">
            <div class="card">
                <div class="card-header">
                    Pengiriman
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Menu</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jumlah Pesanan</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT p.*, m.nama_menu, m.gambar 
                                          FROM tbl_pesanan p
                                          JOIN tbl_daftar_menu m ON p.id_menu = m.id_menu";
                                $result = $connection->query($query);

                                if ($result->num_rows > 0) {
                                    $no = 1;
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><img src="<?= $row['gambar'] ?>" alt="<?= $row['nama_menu'] ?>" style="max-width: 100px; max-height: auto;"></td>
                                            <td><?= $row['nama_menu'] ?></td>
                                            <td><?= $row['username'] ?></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td><?= $row['jumlah_pesanan'] ?></td>
                                            <td><?= $row['total_harga'] ?></td>
                                            <td><?= $row['keterangan'] ?></td>
                                            <td>Pesanan Diterima</td> <!-- atau status lainnya -->
                                        </tr>
                                    <?php $no++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="9">Tidak ada pesanan yang diterima.</td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

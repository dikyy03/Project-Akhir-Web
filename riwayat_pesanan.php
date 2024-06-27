<?php

include "koneksi.php";

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    echo '<script>alert("Anda harus login terlebih dahulu."); window.location.href = "login.php";</script>';
    exit;
}

// Dapatkan username dari session
$username = $_SESSION['username'];

// Query untuk mendapatkan riwayat pesanan berdasarkan username
$query = "SELECT p.id_pesanan, p.alamat, p.keterangan, p.jumlah_pesanan, p.total_harga, p.waktu_pemesanan, p.status, m.nama_menu, m.harga
          FROM tbl_pesanan p
          JOIN tbl_daftar_menu m ON p.id_menu = m.id_menu
          WHERE p.username = '$username'
          ORDER BY p.waktu_pemesanan DESC";
$result = $connection->query($query);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg mt-2">
            <div class="card">
                <div class="card-header">
                    Riwayat Pesanan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Menu</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah Pesanan</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Waktu Pesanan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    $no = 1;
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><?= $row['nama_menu'] ?></td>
                                            <td><?= $row['harga'] ?></td>
                                            <td><?= $row['jumlah_pesanan'] ?></td>
                                            <td><?= $row['total_harga'] ?></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td><?= $row['keterangan'] ?></td>
                                            <td><?= $row['waktu_pemesanan'] ?></td>
                                            <td><?= $row['status'] ?></td>
                                            <td>
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#view_pesanan" data-id_pesanan="<?= $row['id_pesanan'] ?>" data-nama_menu="<?= $row['nama_menu'] ?>" data-harga="<?= $row['harga'] ?>" data-jumlah_pesanan="<?= $row['jumlah_pesanan'] ?>" data-total_harga="<?= $row['total_harga'] ?>" data-alamat="<?= $row['alamat'] ?>" data-keterangan="<?= $row['keterangan'] ?>" data-waktu_pemesanan="<?= $row['waktu_pemesanan'] ?>" data-status="<?= $row['status'] ?>">Lihat</button>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="10">Tidak ada riwayat pesanan.</td>
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

<!-- Modal View Pesanan -->
<div class="modal fade" id="view_pesanan" tabindex="-1" aria-labelledby="viewPesananLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewPesananLabel">Detail Pesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input disabled type="text" class="form-control" id="view_nama_menu" placeholder="Nama Menu" name="nama_menu">
                                <label for="view_nama_menu">Nama Menu</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input disabled type="text" class="form-control" id="view_harga" placeholder="Harga" name="harga">
                                <label for="view_harga">Harga</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input disabled type="text" class="form-control" id="view_jumlah_pesanan" placeholder="Jumlah Pesanan" name="jumlah_pesanan">
                                <label for="view_jumlah_pesanan">Jumlah Pesanan</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input disabled type="text" class="form-control" id="view_total_harga" placeholder="Total Harga" name="total_harga">
                                <label for="view_total_harga">Total Harga</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea disabled class="form-control" id="view_keterangan" style="height: 100px" name="keterangan"></textarea>
                        <label for="view_keterangan">Keterangan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="view_alamat" placeholder="Alamat" name="alamat">
                        <label for="view_alamat">Alamat</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="view_waktu_pemesanan" placeholder="Waktu Pemesanan" name="waktu_pemesanan">
                        <label for="view_waktu_pemesanan">Waktu Pemesanan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="view_status" placeholder="Status" name="status">
                        <label for="view_status">Status</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mengisi data pada modal view pesanan
        var viewModalPesanan = document.getElementById('view_pesanan');
        viewModalPesanan.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var idPesanan = button.getAttribute('data-id_pesanan');
            var namaMenu = button.getAttribute('data-nama_menu');
            var harga = button.getAttribute('data-harga');
            var jumlahPesanan = button.getAttribute('data-jumlah_pesanan');
            var totalHarga = button.getAttribute('data-total_harga');
            var alamat = button.getAttribute('data-alamat');
            var keterangan = button.getAttribute('data-keterangan');
            var waktuPemesanan = button.getAttribute('data-waktu_pemesanan');
            var status = button.getAttribute('data-status');

            var modalNamaMenu = viewModalPesanan.querySelector('#view_nama_menu');
            var modalHarga = viewModalPesanan.querySelector('#view_harga');
            var modalJumlahPesanan = viewModalPesanan.querySelector('#view_jumlah_pesanan');
            var modalTotalHarga = viewModalPesanan.querySelector('#view_total_harga');
            var modalAlamat = viewModalPesanan.querySelector('#view_alamat');
            var modalKeterangan = viewModalPesanan.querySelector('#view_keterangan');
            var modalWaktuPemesanan = viewModalPesanan.querySelector('#view_waktu_pemesanan');
            var modalStatus = viewModalPesanan.querySelector('#view_status');

            modalNamaMenu.value = namaMenu;
            modalHarga.value = harga;
            modalJumlahPesanan.value = jumlahPesanan;
            modalTotalHarga.value = totalHarga;
            modalAlamat.value = alamat;
            modalKeterangan.value = keterangan;
            modalWaktuPemesanan.value = waktuPemesanan;
            modalStatus.value = status;
        });
    });
</script>

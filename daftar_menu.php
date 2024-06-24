<?php
include "koneksi.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg mt-2">
            <div class="card">
                <div class="card-header">
                    Daftar Menu
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_menu">Tambah Menu</button>
                        </div>
                    </div>
                    <!-- Modal Tambah Menu -->
                    <div class="modal fade" id="tambah_menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" action="proses_tambah_menu.php" method="POST" enctype="multipart/form-data" novalidate>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_menu" required>
                                                    <label for="floatingInput">Nama Menu</label>
                                                    <div class="invalid-feedback">Masukkan Nama Menu</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingPassword" placeholder="Harga" name="harga" required>
                                                    <label for="floatingPassword">Harga</label>
                                                    <div class="invalid-feedback">Masukkan Harga</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="floatingTextarea" style="height: 100px" name="keterangan" required></textarea>
                                            <label for="floatingTextarea">Keterangan</label>
                                            <div class="invalid-feedback">Masukkan Deskripsi/Keterangan Menu</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="file" class="form-control" id="formFile" name="gambar" accept="image/*" required>
                                                    <label for="formFile" class="form-label">Upload Gambar</label>
                                                    <div class="invalid-feedback">Masukkan Gambar Menu</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok" required>
                                                    <label for="floatingInput">Stok</label>
                                                    <div class="invalid-feedback">Masukkan Stok Menu</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit Menu -->
                    <div class="modal fade" id="edit_menu" tabindex="-1" aria-labelledby="editMenuLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMenuLabel">Edit Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formEditMenu" action="proses_edit_menu.php" method="POST">
                                        <input type="hidden" name="id_menu" id="edit_id_menu">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="edit_nama_menu" placeholder="Nama Menu" name="nama_menu" required>
                                            <label for="edit_nama_menu">Nama Menu</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="edit_harga" placeholder="Harga" name="harga" required>
                                            <label for="edit_harga">Harga</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="edit_keterangan" style="height: 100px" name="keterangan" required></textarea>
                                            <label for="edit_keterangan">Keterangan</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="edit_stok" placeholder="Stok" name="stok" required>
                                            <label for="edit_stok">Stok</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Modal View Menu -->
                    <div class="modal fade" id="view_menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Menu</h1>
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
                                        <div class="form-floating mb-3">
                                            <textarea disabled class="form-control" id="view_keterangan" style="height: 100px" name="keterangan"></textarea>
                                            <label for="view_keterangan">Keterangan</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="hapus_menu" tabindex="-1" aria-labelledby="hapusMenuLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusMenuLabel">Konfirmasi Hapus Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus menu ini?
                                    <form id="formHapusMenu" method="POST">
                                        <input type="hidden" name="id_menu" id="hapus_id_menu">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-danger" id="btnHapusMenu">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>

                                    <th scope="col">Nama Menu</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM tbl_daftar_menu";
                                $result = $connection->query($query);

                                if ($result->num_rows > 0) {
                                    $no = 1;
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><img src="<?= $row['gambar'] ?>" alt="<?= $row['nama_menu'] ?>" style="max-width: 100px; max-height: auto;"></td>
                                            <td><?= $row['nama_menu'] ?></td>
                                            <td><?= $row['harga'] ?></td>
                                            <td><?= $row['keterangan'] ?></td>
                                            <td><?= $row['stok'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#view_menu" data-nama_menu="<?= $row['nama_menu'] ?>" data-harga="<?= $row['harga'] ?>" data-keterangan="<?= $row['keterangan'] ?>"><i class="bi bi-eye"></i></button>
                                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit_menu" data-id_menu="<?= $row['id_menu'] ?>" data-nama_menu="<?= $row['nama_menu'] ?>" data-harga="<?= $row['harga'] ?>" data-keterangan="<?= $row['keterangan'] ?>" data-stok="<?= $row['stok'] ?>"><i class="bi bi-pencil"></i></button>
                                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus_menu" data-id_menu="<?= $row['id_menu'] ?>"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="6">Tidak ada menu</td>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var viewModalMenu = document.getElementById('view_menu');
        viewModalMenu.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var namaMenu = button.getAttribute('data-nama_menu');
            var harga = button.getAttribute('data-harga');
            var keterangan = button.getAttribute('data-keterangan');

            var modalNamaMenu = viewModalMenu.querySelector('#view_nama_menu');
            var modalHarga = viewModalMenu.querySelector('#view_harga');
            var modalKeterangan = viewModalMenu.querySelector('#view_keterangan');

            modalNamaMenu.value = namaMenu;
            modalHarga.value = harga;
            modalKeterangan.value = keterangan;
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Mengisi data pada modal edit
            var editModalMenu = document.getElementById('edit_menu');
            editModalMenu.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var idMenu = button.getAttribute('data-id_menu');
                var namaMenu = button.getAttribute('data-nama_menu');
                var harga = button.getAttribute('data-harga');
                var keterangan = button.getAttribute('data-keterangan');
                var stok = button.getAttribute('data-stok');

                var modalIdMenu = editModalMenu.querySelector('#edit_id_menu');
                var modalNamaMenu = editModalMenu.querySelector('#edit_nama_menu');
                var modalHarga = editModalMenu.querySelector('#edit_harga');
                var modalKeterangan = editModalMenu.querySelector('#edit_keterangan');
                var modalStok = editModalMenu.querySelector('#edit_stok');

                modalIdMenu.value = idMenu;
                modalNamaMenu.value = namaMenu;
                modalHarga.value = harga;
                modalKeterangan.value = keterangan;
                modalStok.value = stok;
            });
        });



        var hapusModalMenu = document.getElementById('hapus_menu');
        hapusModalMenu.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var idMenu = button.getAttribute('data-id_menu');

            var hapusIdMenu = hapusModalMenu.querySelector('#hapus_id_menu');
            hapusIdMenu.value = idMenu;
        });

        document.getElementById('btnHapusMenu').addEventListener('click', function() {
            var formHapusMenu = document.getElementById('formHapusMenu');
            var formData = new FormData(formHapusMenu);

            fetch('proses_hapus_menu.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(result => {
                    alert(result);
                    // Refresh halaman setelah menghapus
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>
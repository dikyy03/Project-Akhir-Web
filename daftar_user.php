<?php
include "koneksi.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg mt-2">
            <div class="card">
                <div class="card-header">
                    Daftar User
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_user">Tambah User</button>
                        </div>
                    </div>
                    <!-- Modal Tambah User -->
                    <div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" action="proses_tambah_user.php" method="POST" novalidate>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama" name="nama_lengkap" required>
                                                    <label for="floatingInput">Nama Lengkap</label>
                                                    <div class="invalid-feedback">Masukkan Nama Lengkap</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingPassword" placeholder="Username" name="username" required>
                                                    <label for="floatingInput">Username</label>
                                                    <div class="invalid-feedback">Masukkan Username</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" aria-label="Default select example" name="status" required>
                                                        <option selected hidden value="">Pilih Status</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="kurir">Kurir</option>
                                                        <option value="pelanggan">Pelanggan</option>
                                                    </select>
                                                    <label for="floatingInput">Status User</label>
                                                    <div class="invalid-feedback">Pilih Status</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxxx" name="nomor_telepon" required>
                                                    <label for="floatingInput">No Telepon</label>
                                                    <div class="invalid-feedback">Masukkan Nomor Telepon</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingPassword" placeholder="name@example.com" name="email" required>
                                            <label for="floatingInput">Email</label>
                                            <div class="invalid-feedback">Masukkan Email</div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" disabled value="12345" name="password">
                                            <label for="floatingPassword">Password</label>
                                            <div class="invalid-feedback">Masukkan Password</div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="floatingTextarea" style="height: 100px" name="alamat" required></textarea>
                                            <label for="floatingTextarea">Alamat</label>
                                            <div class="invalid-feedback">Masukkan Alamat</div>
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

                    <!-- Modal View -->
                    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="view_nama_lengkap" placeholder="Nama" name="nama_lengkap">
                                                    <label for="view_nama_lengkap">Nama Lengkap</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="view_username" placeholder="Username" name="username">
                                                    <label for="view_username">Username</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="view_status" placeholder="Status" name="status">
                                                    <label for="view_status">Status User</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="view_nomor_telepon" placeholder="08xxxxxxxxxxx" name="nomor_telepon">
                                                    <label for="view_nomor_telepon">No Telepon</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input disabled type="email" class="form-control" id="view_email" placeholder="name@example.com" name="email">
                                            <label for="view_email">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea disabled class="form-control" id="view_alamat" style="height: 100px" name="alamat"></textarea>
                                            <label for="view_alamat">Alamat</label>
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
                    <div class="modal fade" id="hapus_user" tabindex="-1" aria-labelledby="hapusUserLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusUserLabel">Konfirmasi Hapus User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus user ini?
                                    <form id="formHapusUser" method="POST">
                                        <input type="hidden" name="id_user" id="hapus_id_user">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-danger" id="btnHapusUser">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM tbl_user";
                                $result = $connection->query($query);

                                if ($result->num_rows > 0) {
                                    $no = 1;
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><?= $row['username'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td><?= $row['nomor_telepon'] ?></td>
                                            <td><?= $row['status'] ?></td>
                                            <td class="d-flex">
                                                <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#view" data-username="<?= $row['username'] ?>" data-email="<?= $row['email'] ?>" data-alamat="<?= $row['alamat'] ?>" data-nomor_telepon="<?= $row['nomor_telepon'] ?>" data-status="<?= $row['status'] ?>" data-nama_lengkap="<?= $row['nama_lengkap'] ?>"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus_user" data-id_user="<?= $row['id_user'] ?>"><i class="bi bi-trash"></i></button>
                                            </td>

                                        </tr>
                                    <?php $no++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="7">Tidak ada user</td>
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
        var viewModal = document.getElementById('view');
        viewModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var username = button.getAttribute('data-username');
            var email = button.getAttribute('data-email');
            var alamat = button.getAttribute('data-alamat');
            var nomorTelepon = button.getAttribute('data-nomor_telepon');
            var status = button.getAttribute('data-status');
            var namaLengkap = button.getAttribute('data-nama_lengkap');

            var modalUsername = viewModal.querySelector('#view_username');
            var modalEmail = viewModal.querySelector('#view_email');
            var modalAlamat = viewModal.querySelector('#view_alamat');
            var modalNomorTelepon = viewModal.querySelector('#view_nomor_telepon');
            var modalStatus = viewModal.querySelector('#view_status');
            var modalNamaLengkap = viewModal.querySelector('#view_nama_lengkap');

            modalUsername.value = username;
            modalEmail.value = email;
            modalAlamat.value = alamat;
            modalNomorTelepon.value = nomorTelepon;
            modalStatus.value = status;
            modalNamaLengkap.value = namaLengkap;
        });

        var hapusModal = document.getElementById('hapus_user');
        hapusModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var idUser = button.getAttribute('data-id_user');

            var hapusIdUser = hapusModal.querySelector('#hapus_id_user');
            hapusIdUser.value = idUser;
        });

        document.getElementById('btnHapusUser').addEventListener('click', function() {
            var formHapusUser = document.getElementById('formHapusUser');
            var formData = new FormData(formHapusUser);

            fetch('proses_hapus_user.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(result => {
                    if (result === 'success') {
                        location.reload();
                    } else {
                        alert('Gagal menghapus user.');
                    }
                });
        });

        // Bootstrap validation
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    });
</script>
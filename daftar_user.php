<div class="container-fluid">
    <div class="row">
        <div class="col-lg mt-2">
            <div class="card">
                <div class="card-header">
                    Daftar User
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM tbl_user";
                                $result = $connection->query($query);

                                if ($result->num_rows > 0) {
                                    $no = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        $no ?>
                                        <tr>
                                            <th scope="row"><?= $no ?> </th>
                                            <td><?= $row['username'] ?> </td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td><?= $row['nomor_telepon'] ?></td>
                                            <td class="d-flex">
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></i></button>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="5">Tidak ada user</td>
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
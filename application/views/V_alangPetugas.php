<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 fw-bolder">Petugas</h1>

                <div class="card mb-4">
                    <div class="card-header">

                        <i class="fas fa-table me-1"></i>
                        Data Masyarakat

                        <!-- tambah petugas -->

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light btn-outline-primary" style="border-radius: 50px;" data-bs-toggle="modal" data-bs-target="#petugas">
                            <i class="fa-solid fa-plus"></i>Petugas
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="petugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="petugas">Tambah Petugas</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?= base_url('C_alangDashboard/tambahPetugas') ?>">
                                            <div class="mb-3">
                                                <label for="petugas" class="form-label">Nama Petugas</label>
                                                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username">
                                            </div>
                                            <div class="mb-3">
                                                <label for="telepon" class="form-label">Nomer Telepon</label>
                                                <input type="number" class="form-control" id="telepon" name="telepon">
                                            </div>
                                            <div class="mb-3">
                                                <label for="telepon" class="form-label">Sebagai</label>
                                                <select class="form-select" aria-label="Default select example" id="level" name="level">
                                                    <option selected>- Pilih -</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="petugas">Petugas</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="password1" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password1" name="password1">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="password2" class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" id="password2" name="password2">
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




                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Petugas</th>
                                    <th>Nomer Telepon</th>
                                    <th>Sebagai</th>

                                </tr>
                            </thead>


                            <tbody>
                                <?php $no = 1;
                                foreach ($petugas as $pt) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $pt['nama_petugas'] ?></td>
                                        <td><?= $pt['telp'] ?></td>
                                        <td><?= $pt['level'] ?></td>


                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
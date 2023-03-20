<div id="layoutSidenav">
   <div id="layoutSidenav_content">
      <main>
         <div class="container-fluid px-4">



            <h1 class="mt-4">Pengaduan</h1>



            <div class="col-xl-12">
               <div class="card mb-3">
                  <div class="card-header">
                     <i class="fas fa-chart-area me-1"></i>
                     Pengaduan
                  </div>
                  <div class="card-body">

                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Pengaduan</button>

                     <!--  -->

                     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Input Pengaduan</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                 <form action="<?= base_url('C_alangUser/tambahPengaduan') ?>" method="post" enctype="multipart/form-data">

                                    <div class="row">

                                       <div class="col-md-12">
                                          <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                             <select name="kategori" class="form form-select" id="kategori">
                                                <option selected>- Pilih -</option>
                                                <?php foreach ($kategori as $k) : ?>
                                                   <option value="<?= $k['id'] ?>"><?= $k['kategori'] ?></option>
                                                <?php endforeach; ?>
                                             </select>
                                          </div>

                                          <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Sub Kategori</label>
                                             <select name="subkategori" class="form form-select" id="subkategori">
                                                <option selected>- Pilih -</option>
                                             </select>
                                          </div>
                                          <div class="mb-3">
                                             <label for="exampleInputPassword1" class="form-label">Tanggal Pengaduan</label>
                                             <input type="date" class="form-control" id="tanggal" aria-describedby="emailHelp" name="tanggal">
                                          </div>
                                          <div class="mb-3">
                                             <label for="exampleInputPassword1" class="form-label">Isi Laporan Pengaduan</label>
                                             <input type="text" class="form-control" id="isi" aria-describedby="emailHelp" name="isi">
                                          </div>
                                          <div class="mb-3">
                                             <label for="exampleInputPassword1" class="form-label">Image</label>
                                             <input type="file" class="form form-control" name="foto" id="image">
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

                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">No</th>
                              <th scope="col">Tanggal</th>
                              <th scope="col">Kategori</th>
                              <th scope="col">Isi</th>
                              <th scope="col">Status</th>
                           </tr>
                        </thead>
                        <tbody class="table-group-divider">
                           <?php $no = 1;
                           foreach ($pengaduan as $pd) : ?>
                              <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $pd['tgl_pengaduan'] ?></td>
                                 <td><?= $pd['kategori'] ?></td>
                                 <td><?= $pd['isi_laporan'] ?></td>
                                 <td>
                                 <?php if ($pd['status'] == '0') : ?>
                                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ngadu<?= $pd['id'] ?>">
                                              Tindakan
                                          </button>
                                      <?php endif ?>
                                      <?php if ($pd['status'] == "proses") : ?>
                                          <a type="button" class="btn btn-warning" href="<?php base_url('')?>">
                                              Proses
                                      </a>
                                      <?php endif ?>
                                      <?php if ($pd['status'] == "selesai") : ?>
                                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ngadu<?= $pd['id'] ?>">
                                              Selesai
                                          </button>
                                      <?php endif ?>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </main>
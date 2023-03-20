<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 fw-bolder">Masyarakat</h1>




                <div class="card mb-4">
                    <div class="card-header">

                        <i class="fas fa-table me-1"></i>
                        Data Masyarakat




                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>No Telepon</th>

                                </tr>
                            </thead>


                            <tbody>
                                <?php $no = 1;
								foreach ($masyarakat as $ms) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ms['nama'] ?></td>
                                    <td><?= $ms['nik'] ?></td>
                                    <td><?= $ms['telepon'] ?></td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>






                        </table>
                    </div>
                </div>
                 
   </div> 

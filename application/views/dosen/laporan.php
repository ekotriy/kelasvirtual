<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="" class="h3 mb-0 text-gray-800 card-link"><?= $kelas['kelas']; ?></a>

    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <a href="<?= base_url(); ?>dosen/allmateri/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="list-group-item text-dark card-link">Materi</a>
                    <a href="<?= base_url(); ?>dosen/alltugas/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="list-group-item text-dark card-link ml-0">Tugas</a>
                    <a href="<?= base_url(); ?>dosen/laporan/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="list-group-item text-dark card-link ml-0">Laporan</a>
                </ul>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <!-- Area Chart -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Jenis</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tugas</td>
                                <td>

                                    <a href="<?= base_url(); ?>dosen/laptugas/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="btn btn-success"> <i class="fas fa-search">
                                            <span>Detail</span></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Materi</td>
                                <td>

                                    <a href="<?= base_url(); ?>dosen/lapmateri/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="btn btn-success"> <i class="fas fa-search">
                                            <span>Detail</span></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>











    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
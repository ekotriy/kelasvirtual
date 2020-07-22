<div class="col-xl-9 col-lg-8">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kelas</h1>
    </div>
    <!-- Area Chart -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered  table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Pembuat</th>
                        <th scope="col"><a href="<?= base_url(); ?>admin/tambahkelas" class="btn btn-success"> <i class="fas fa-plus-circle"> <span>Tambah</span></i></a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; ?>
                    <?php foreach ($kelas as $item) : ?>
                        <tr>
                            <td scope="row"><?= $a++; ?></td>
                            <td><?= $item['kelas']; ?></td>
                            <td><?= $item['nama']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>admin/anggota/<?= $item['kode']; ?>" class="btn btn-primary"> <i class="fas fa-users"> <span>Anggota</span></i></a>
                                <a href="<?= base_url(); ?>admin/Hapusk/<?= $item['id_kelas']; ?>/<?= $item['kode']; ?>" class="btn btn-danger"> <i class="fas fa-trash-alt"> <span>Hapus</span></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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
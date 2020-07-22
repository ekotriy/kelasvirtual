<div class="col-xl-8 col-lg-7">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Tugas</h1>
    </div>
    <!-- Area Chart -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tugas</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tgl selesai</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; ?>
                    <?php foreach ($tugas as $item) : ?>
                        <tr>
                            <td scope="row"><?= $a++; ?></td>
                            <td><?= $item['tugas'] ?></td>
                            <td><?= $item['kelas'] ?></td>
                            <td><?= $item['keterangan'] ?></td>
                            <td><?= $item['tgl_selesai'] ?></td>
                            <td>
                                <a href="<?= base_url(); ?>admin/Hapust/<?= $item['id_tugas'] ?>" class="btn btn-danger"> <i class="fas fa-trash-alt"> <span>Hapus</span></i></a>
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
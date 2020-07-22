<div class="col-xl-9 col-lg-8">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Anggota Kelas</h1>
    </div>
    <!-- Area Chart -->
    <div class="card-body">
        <?= $this->session->flashdata('massage'); ?>
        <div class="table-responsive">
            <a href="<?= base_url(); ?>admin/anggotatambah/<?= $kelas['kode']; ?>  " class="btn btn-success mb-2">Tambah anggota</a>
            <table class="table table-bordered  table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Anggota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; ?>
                    <?php foreach ($anggota as $item) : ?>
                        <tr>
                            <td scope="row"><?= $a++; ?></td>
                            <td><?= $item['nama']; ?> </td>
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
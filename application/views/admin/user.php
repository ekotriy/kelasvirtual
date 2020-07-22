<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Is_active</th>
                            <th scope="col"><a href="<?= base_url() ?>admin/tambah" class="btn btn-primary"> <i class="fas fa-plus-circle">
                                        <span>Tambah</span></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a = 1; ?>
                        <?php foreach ($alluser as $item) : ?>
                            <tr>
                                <td scope="row"><?= $a++; ?></td>
                                <td><?= $item['nama']; ?></td>
                                <td><?= $item['email']; ?></td>
                                <td><?= $item['role']; ?></td>
                                <td>
                                    <?php if ($item['is_active'] == 1) : ?>
                                        <input type="checkbox" class="form-check-input ml-2" id="exampleCheck1" checked='checked' disabled="disabled">
                                    <?php else : ?>
                                        <input type="checkbox" class="form-check-input ml-2" id="exampleCheck1" disabled="disabled">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/edit/<?= $item['id_user']; ?>" class="btn btn-success"> <i class="fas fa-user-edit">
                                            <span>Edit</span></i></a>
                                    <a href="<?= base_url(); ?>admin/hapus/<?= $item['id_user']; ?>/<?= $item['id_role']; ?>" class="btn btn-danger"> <i class="fas fa-trash-alt">
                                            <span>Hapus</span></i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->
</div>
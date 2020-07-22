<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">

        <div class="col-xl-8 col-lg-7">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
                </div>
                <div class="card-body">
                    <!-- <form action="" method="post"> -->
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                            <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                            <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password1" id="password">
                            <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password2">Ulangi password</label>
                            <input type="password" class="form-control" name="password2" id="password2">
                            <?= form_error('password2','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password2">Status</label>
                            <select class="form-control" name="id_role">
                                <option value="1">Admin</option>
                                <option value="2">Dosen</option>
                                <option value="3">Mahasiswa</option>
                            </select>
                            <?= form_error('id_role','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_active"
                                value="1">
                            <label class="form-check-label" for="exampleCheck1">Aktif</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                        <a href="<?= base_url()?>admin/user" type="submit" class="btn btn-success"
                            name="submit">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
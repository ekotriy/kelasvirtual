<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="card-body">
            <div class="card mb-3 ">
                <div class="row no-gutters">
                    <div class="col-md-3 p-2">
                        <img src="<?= base_url(); ?>assets/img/profile/<?= $profile['foto']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8 offset-md-1">
                        <div class="card-body">
                            <?= $this->session->flashdata('massage'); ?>
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" value="<?= $profile['nama']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" value="<?= $profile['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" value="<?= $profile['alamat']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jurusan</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" value="<?= $profile['jurusan']; ?>">
                                    </div>
                                </div>

                                <a href="<?= base_url(); ?>home/edit" class="btn btn-success">Edit</a>
                                <a href="<?= base_url(); ?>home/hapus/<?= $profile['id_user']; ?>" class="btn btn-danger">Hapus</a>
                                <a href="<?= base_url(); ?>home/gantipassword" class="btn btn-warning">Ganti Password</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
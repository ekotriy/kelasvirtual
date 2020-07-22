<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>
        <div class="card-body">

            <?= form_open_multipart('admin/edit/' . $this->uri->segment(3)); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $edit['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="nama" value="<?= $edit['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Aktifkan</label>
                <div class="col-sm-10">
                    <select class="form-control" name="is_active">
                        <option value="1">Aktifkan</option>
                        <option value="0">Non Aktifkan</option>
                    </select>
                    <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url(); ?>assets/img/profile/<?= $edit['foto']; ?>" alt="gambar" class="img-thumbnail">
                        </div>
                        <div class="col-sm-5">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="foto">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                    <a href="<?= base_url() ?>admin/user" type="submit" class="btn btn-success" name="submit">Batal</a>
                </div>
            </div>
            </form>


        </div>



        <!-- </ul>
        </div> -->
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->
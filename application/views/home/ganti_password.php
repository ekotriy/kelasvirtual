<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('massage'); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="password_lama">Password Lama</label>
                            <input type="password" class="form-control" id="password_lama" name="password_lama">
                            <?= form_error('password_lama','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru1">Password Baru</label>
                            <input type="password" class="form-control" id="password_baru1" name="password_baru1">
                            <?= form_error('password_baru1','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru2">Ulangi Password</label>
                            <input type="password" class="form-control" id="password_baru2" name="password_baru2">
                            <?= form_error('password_baru2','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Ganti Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- </ul>
        </div> -->
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->
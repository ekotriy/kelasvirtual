<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
        </div>
        <div class="card-body">

            <form action="" method="POST">
                <div class="form-group row">
                    <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $edit['kode']; ?>"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $edit['kelas']; ?>">
                        <?= form_error('kelas','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pembuat" class="col-sm-2 col-form-label">Pembuat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pembuat" name="pembuat"
                            value="<?= $edit['nama']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="submit">Edit</button>
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
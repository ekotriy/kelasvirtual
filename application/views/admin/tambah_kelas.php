<div class="col-xl-8 col-lg-7">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kelas</h1>
    </div>
    <!-- Area Chart -->
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST">
                <div class="form-group">
                    <label for="kelas">Nama kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas">
                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Dosen kelas</label>
                    <select class="form-control" name="dosen">
                        <option disabled selected>Nama dosen</option>
                        <?php foreach ($dosen as $item) : ?>
                            <option value="<?= $item['id_user']; ?> "><?= $item['nama']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Buat</button>
            </form>
        </div>
    </div>


</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
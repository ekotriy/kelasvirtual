<div class="col-xl-9 col-lg-8">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Anggota Kelas</h1>
    </div>
    <!-- Area Chart -->
    <div class="card-body">
        <div class="table-responsive">
            <?= $this->session->flashdata('massage'); ?>
            <form method="POST">
                <div class="form-group">
                    <label for="kelas">Nama kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $kelas['kelas']; ?> " readonly>
                </div>
                <div class="form-group">
                    <label for="kelas">Nama kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kode" value="<?= $kelas['kode']; ?> " readonly>
                </div>
                <div class="form-group">
                    <label>Nama mahasiswa</label>
                    <select class="form-control" name="mahasiswa">
                        <option disabled selected>Mahasiswa</option>
                        <?php foreach ($anggota as $item) : ?>
                            <option value="<?= $item['id_user']; ?> "><?= $item['nama']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('mahasiswa', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>


</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
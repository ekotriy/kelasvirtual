<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Tugas</h6>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nama</label>
                        <li class="list-group-item"><?= $tugas['nama']; ?></li>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Kelas</label>
                        <li class="list-group-item"><?= $kelas['kelas']; ?></li>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress"><?= $tugas['tugas']; ?></label>
                    <li class="list-group-item">
                        <h5 class="card-title"><?= $tugas['judul']; ?></h5>
                        <h6 class="card-subtitle mb-2 mt-1 text-muted"><?= $tugas['tgl_kirim']; ?></h6>
                        <p class="card-text"><?= $tugas['keterangan']; ?></p>
                    </li>
                </div>
                <a href="<?= base_url(); ?>dosen/ldownload/<?= $tugas['id_lap']; ?>" class="btn btn-primary"> Download Tugas</a>
            </form>



        </div>

    </div>

</div>
<!-- End of Main Content -->
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="" class="h3 mb-0 text-gray-800 card-link"><?= $kelas['kelas']; ?></a>
  </div>
  <div class="row">
    <div class="col-xl-4 col-lg-5">
      <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <a href="<?= base_url(); ?>dosen/allmateri/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="list-group-item text-dark card-link">Materi</a>
          <a href="<?= base_url(); ?>dosen/alltugas/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="list-group-item text-dark card-link ml-0">Tugas</a>
          <a href="<?= base_url(); ?>dosen/laporan/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="list-group-item text-dark card-link ml-0">Laporan</a>
          <a href="<?= base_url() ?>dosen/tambahmateri/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="list-group-item text-dark card-link ml-0">Tambah materi</a>
        </ul>
      </div>
    </div>

    <div class="col-xl-8 col-lg-7">
      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Materi</h6>
        </div>
        <div class="card-body">
          <!-- <form action="" method="post"> -->
          <?= form_open_multipart('dosen/tambahmateri/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)); ?>
          <div class="form-group">
            <label for="namamateri">Nama Materi</label>
            <input type="text" class="form-control" name="judul" id="namamateri">
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" rows="4" name="keterangan" id="keterangan"></textarea>
          </div>
          <form>
            <div class="form-group">
              <div class="col-sm-8">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="materi">
                  <label class="custom-file-label" for="image">Choose file</label>
                  <small class="form-text text-muted"><span class="text-danger">Penting !</span> format file harus pdf atau docx. ukuran maksimal 3MB</small>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
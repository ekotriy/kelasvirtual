<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <!-- Area Chart -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Kirim Tugas</h6>
    </div>
    <div class="card-body">
      <!-- <form action="" method="post"> -->
      <?= form_open_multipart('mahasiswa/kirimtugas/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" name="judul" id="judul">
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" rows="4" name="keterangan" id="keterangan"></textarea>
      </div>
      <form>
        <div class="form-group">
          <div class="col-sm-8">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="tugas">
              <label class="custom-file-label" for="image">Choose file</label>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
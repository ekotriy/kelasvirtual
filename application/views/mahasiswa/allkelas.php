<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar kelas</h1>
  </div>
  <div class="row">
    <?php foreach ($kelas as $item) : ?>

      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">

            <div class="row mb-3">
              <div class="col">
                <h5 class="card-title"><?= $item['kelas']; ?></h5>
              </div>

              <div class="col">
                <div class="text-right">
                  <a href="<?= base_url(); ?>mahasiswa/pengaturan/<?= $item['kode']; ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-cog"></i>
                    </span>
                  </a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <a href="<?= base_url(); ?>mahasiswa/kelas/<?= $item['id_kelas']; ?>/<?= $item['kode']; ?>" class="btn btn-primary btn-icon-split mr-2">
                  <span class="icon text-white-50">
                    <i class="fas fa-info-circle"></i>
                  </span>
                  <span class="text">Detail</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
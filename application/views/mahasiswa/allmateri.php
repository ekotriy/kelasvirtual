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
                    <a href="<?= base_url(); ?>mahasiswa/allmateri/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="list-group-item text-dark card-link">Materi</a>
                    <a href="<?= base_url(); ?>mahasiswa/alltugas/<?= $kelas['id_kelas']; ?>/<?= $kelas['kode']; ?>" class="list-group-item text-dark card-link ml-0">Tugas</a>
                </ul>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <!-- Area Chart -->
            <div class="row">
                <?php foreach ($materi as $item) : ?>
                    <div class="col-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col">
                                        <h5 class="card-title"><?= $item['materi']; ?></h5>
                                    </div>
                                </div>
                                <a href="<?= base_url(); ?>mahasiswa/materi/<?= $item['id_kelas']; ?>/<?= $item['id_materi']; ?>" class="card-link">Detail</a>
                                <a href="<?= base_url(); ?>mahasiswa/Mdownload/<?= $item['id_kelas']; ?>/<?= $item['id_materi']; ?>" class="card-link">Donwload</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
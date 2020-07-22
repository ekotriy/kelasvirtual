<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="" class="h3 mb-0 text-gray-800 card-link"><?=$kelas['kelas'];?></a>

    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <a href="<?= base_url(); ?>dosen/allmateri/<?=$kelas ['id_kelas'];?>/<?= $kelas ['kode'];?>"
                        class="list-group-item text-dark card-link">Materi</a>
                    <a href="<?= base_url(); ?>dosen/alltugas/<?=$kelas ['id_kelas'];?>/<?= $kelas ['kode'];?>"
                        class="list-group-item text-dark card-link ml-0">Tugas</a>
                    <a href="<?= base_url(); ?>dosen/laporan/<?=$kelas ['id_kelas'];?>/<?= $kelas ['kode'];?>" class="list-group-item text-dark card-link ml-0">Laporan</a>
                    <a href="<?= base_url()?>dosen/tambahtugas/<?=$kelas['id_kelas'];?>/<?=$kelas['kode'];?>"
                        class="list-group-item text-dark card-link ml-0">Tambah tugas</a>
                </ul>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <!-- Area Chart -->
            <div class="row">
                <?php foreach($tugas as $item):?>
                <div class="col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <h5 class="card-title"><?= $item['tugas']; ?></h5>
                                </div>

                                <div class="col">
                                    <div class="text-right">
                                        <a href="<?= base_url(); ?>dosen/HapusT/<?= $item ['id_tugas'];?>"
                                            class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6>Tanggal selesai</h6>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $item['tgl_selesai']; ?></h6>
                                </div>
                            </div>
                            <a href="<?= base_url(); ?>dosen/tugas/<?=$item ['id_kelas'];?>/<?= $item ['id_tugas'];?>"
                                class="card-link">Lihat</a>
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
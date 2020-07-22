<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?=$tugas['tugas'];?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tugas</th>
                            <th scope="col">Tgl Kirim</th>
                            <th scope="col">File</th>
                            <th scope="col">Pengirim</th>
                            <th scope="col"><a href="<?= base_url(); ?>dosen/laporan/<?= $kelas ['id_kelas'];?>/<?= $kelas ['kode'];?>" class="btn btn-warning"> <i class="fas fa-chevron-circle-left"> <span>Kembali</span></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $a=1; ?>
                    <?php foreach($laporan as $item): ?>
                        <tr>
                            <td scope="row"><?= $a++;?></td>
                            <td><?=$item['tugas'];?></td>
                            <td><?=$item['tgl_kirim'];?></td>
                            <td><?=$item['file'];?></td>
                            <td><?=$item['nama'];?></td>
                            <td>
                                <a href="<?= base_url(); ?>dosen/detailtugas/<?= $item ['id_lap'];?>/<?= $item ['id_user'];?>" class="btn btn-success"> <i class="fas fa-search"> <span>Lihat</span></i></a>
                                <a href="<?= base_url(); ?>dosen/ldownload/<?= $item ['id_lap'];?>" class="btn btn-primary"> <i class="fas fa-arrow-alt-circle-down"> <span>Download</span></i></a>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->
</div>
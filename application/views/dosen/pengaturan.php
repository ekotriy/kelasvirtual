<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card" style="width: 18rem;">
        <div class="card-header bg-primary" style="color:white;">
            <i class="fas fa-cog"></i>
            Pengaturan
        </div>
        <ul class="list-group list-group-flush">
            <a href="<?= base_url();?>dosen/kodekelas/<?= $kode['kode']; ?>" class="list-group-item card-link"> <i
                    class="fas fa-code"></i> Lihat Kode Kelas</a>
            <a href="<?= base_url();?>dosen/editkelas/<?= $kode['kode']; ?>" class="list-group-item card-link ml-0"><i
                    class="fas fa-edit pr-1"></i>Edit Kelas</a>
            <a href="<?= base_url();?>dosen/hapuskelas/<?= $kode['id_kelas']; ?>/<?= $kode['kode']; ?>" class="list-group-item card-link ml-0"><i
                    class="fas fa-trash-alt pr-2"></i>Hapus Kelas</a>
            <a href="<?= base_url();?>dosen/anggota/<?= $kode['kode']; ?>" class="list-group-item card-link ml-0"><i
                    class="fas fa-users pr-2"></i>Anggota Kelas</a>
        </ul>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card" style="width: 18rem;">
        <div class="card-header bg-primary" style="color:white;">
            <i class="fas fa-cog"></i>
            Pengaturan
        </div>
        <ul class="list-group list-group-flush">
            <a href="<?= base_url();?>mahasiswa/kodekelas/<?= $kode['kode']; ?>" class="list-group-item card-link"> <i
                    class="fas fa-code"></i> Lihat Kode Kelas</a>
            <a href="<?= base_url();?>mahasiswa/anggota/<?= $kode['kode']; ?>" class="list-group-item card-link ml-0"><i
                    class="fas fa-users pr-2"></i>Anggota Kelas</a>
            <a href="<?= base_url();?>mahasiswa/keluar/<?= $anggota['id']; ?>" class="list-group-item card-link ml-0"><i
                    class="fas fa-sign-out-alt pr-1"></i>Keluar kelas</a>
        </ul>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
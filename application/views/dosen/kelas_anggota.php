<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">anggota</th>
        </tr>
      </thead>
      <tbody>
        <?php $a=1; ?>
        <?php foreach($anggota as $item):?>
        <tr>
          <td scope="row"><?= $a++;?></td>
          <td><?=$item['nama'];?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
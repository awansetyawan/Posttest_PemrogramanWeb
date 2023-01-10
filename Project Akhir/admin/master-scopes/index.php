<?php require_once('../../layouts/admin/header.php') ?>

<?php
$scopes = all("scopes");
?>

<section>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Lingkup Pengujian</h3>
        <a href="./create.php" class="btn btn-outline-primary">
          <i class="fa-solid fa-add"></i>
          <span>Tambah Lingkup Pengujian</span>
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-wrapper">

        <table class="datatable">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama</th>
              <th>Penjelasan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($scopes as $scope) : ?>
              <tr>
                <td><?= $scope->code ?></td>
                <td><?= $scope->name ?></td>
                <td><?= $scope->desc ?></td>
                <td>
                  <div class="p-1 d-flex align-items-center">
                    <a href="./edit.php?id=<?= $scope->id ?>" class="btn btn-sm btn-warning mr-1">
                      <i class="fa-solid fa-pen ml-1"></i>
                    </a>
                    <a data-url="../../admin/master-scopes/delete.php?id=<?= $scope->id ?>" class="btn btn-sm btn-danger mr-1 delete-btn">
                      <i class="fa-solid fa-trash-can ml-1"></i>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<?php require_once('../../layouts/admin/footer.php') ?>
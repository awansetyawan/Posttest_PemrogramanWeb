<?php require_once('../../layouts/admin/header.php') ?>

<?php
$auditors = all("auditors");
?>

<section>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Daftar Auditor</h3>
        <a href="./create.php" class="btn btn-outline-primary">
          <i class="fa-solid fa-user-plus"></i>
          <span>Tambah Auditor</span>
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-wrapper">

        <table class="datatable">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Kontak</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($auditors as $auditor) : ?>
              <tr>
                <td>
                  <img
                    src="../../storage/auditors/<?= $auditor->photo ?>"
                    alt="<?= $auditor->first_name ?> <?= $auditor->last_name ?>"
                    style="height: 10rem"
                  >
                </td>
                <td><?= $auditor->first_name ?> <?= $auditor->last_name ?></td>
                <td><?= $auditor->email ?></td>
                <td><?= $auditor->phone_number ?></td>
                <td>
                  <div class="p-1 d-flex align-items-center">
                    <a href="./show.php?id=<?= $auditor->id ?>" class="btn btn-sm btn-secondary mr-1">
                      <i class="fa-solid fa-circle-info"></i>
                    </a>
                    <a href="./edit.php?id=<?= $auditor->id ?>" class="btn btn-sm btn-warning mr-1">
                      <i class="fa-solid fa-pen ml-1"></i>
                    </a>
                    <a data-url="../../admin/auditors/delete.php?id=<?= $auditor->id ?>" class="btn btn-sm btn-danger mr-1 delete-btn">
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
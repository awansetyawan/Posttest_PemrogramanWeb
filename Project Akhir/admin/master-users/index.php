<?php require_once('../../layouts/admin/header.php') ?>

<?php
$users = all("users");
?>

<section>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Daftar User</h3>
        <!-- <a href="./create.php" class="btn btn-outline-primary">
          <i class="fa-solid fa-user-plus"></i>
          <span>Tambah User</span>
        </a> -->
      </div>
    </div>
    <div class="card-body">
      <div class="table-wrapper">

        <table class="datatable">
          <thead>
            <tr>
              <th>Username</th>
              <th>Hak Akses</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) : ?>
              <tr>
                <td><?= $user->username ?></td>
                <td><?= [
                  '1' => 'admin',
                  '2' => 'auditor',
                  '3' => 'company'
                ][$user->role] ?></td>
                <td>
                  <div class="p-1 d-flex align-items-center">
                    <a href="./edit.php?id=<?= $user->id ?>" class="btn btn-sm btn-warning mr-1">
                      <i class="fa-solid fa-pen ml-1"></i>
                    </a>
                    <a href="./reset-password.php?id=<?= $user->id ?>" class="btn btn-sm btn-info mr-1">
                      <i class="fa-solid fa-key ml-1"></i>
                    </a>
                    <a data-url="../../admin/master-users/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-danger mr-1 delete-btn">
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
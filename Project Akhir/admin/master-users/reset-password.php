<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['id'])) {
  header("Location: ./index.php");
}

$user = find("users", $_GET['id']);

if (isset($_POST['password'])) {
  if ($_POST['password'] != $_POST['password_confirmation']) {
    flash("Password Baru dan Konfirmasi Password tidak sama!", "error");
    header("Location: ${$_SERVER['PHP_SELF']}?id={$_POST['id']}");
  }
  update("users", [
    "id" => $_GET['id'],
    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
  ]);
  flash("Ubah password berhasil!", "success");
  header("Location: ./index.php");
}
?>

<section>
  <div class="card mb-3">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Detail Singkat User</h3>
      </div>
    </div>
    <div class="card-body">
      <div class="row descriptions">
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Username</div>
            <div class="description-value"><?= $user->username ?></div>
          </div>
        </div>
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Hak Akses</div>
            <div class="description-value"><?= [
              '1' => 'admin',
              '2' => 'auditor',
              '3' => 'company'
            ][$user->role] ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Ubah Password</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST">
        <input type="hidden" class="w-100" name="id" required value="<?= $_GET['id'] ?>">
        <div class="form-control">
          <label for="">Password Baru</label>
          <div class="input-wrapper">
            <input type="password" class="w-100" name="password" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Konfirmasi Password</label>
          <div class="input-wrapper">
            <input type="password" class="w-100" name="password_confirmation" required>
          </div>
        </div>
        <div class="text-right mt-3">
          <button class="btn" type="submit">
            <span>Simpan</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>
<?php require_once('../../layouts/admin/footer.php') ?>
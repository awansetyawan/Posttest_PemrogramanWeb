<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['id'])) {
  header("Location: ./index.php");
}

$user = find("users", $_GET['id']);

if (isset($_POST['username'])) {
  $isUsernameExist = query("SELECT * FROM users WHERE username='{$_POST['username']}' AND id != {$user->id}");
  if (!empty($isUsernameExist)) {
    flash("Username sudah ada!", "error");
    header("Location: ${$_SERVER['PHP_SELF']}?id={$_POST['id']}");
  }
  update("users", [
    "id" => $_GET['id'],
    "username" => $_POST['username'],
  ]);
  flash("Ubah data pengguna berhasil!", "success");
  header("Location: ./index.php");
}
?>

<section>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Ubah Pengguna</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST">
        <input type="hidden" class="w-100" name="id" required value="<?= $_GET['id'] ?>">
        <div class="form-control">
          <label for="">Username</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="username" required value="<?= $user->username ?>">
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
<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['id'])) {
    header('Location: ./index.php');
}

$standard = find("standards", $_GET['id']);

if (isset($_POST['code'])) {
  update("standards");
  flash("Data Standar berhasil Diubah", "success");
  header("Location: ./index.php");
}
?>

<section>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Ubah Standar</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST">
      <input type="hidden" class="w-100" name="id" value="<?= $_GET['id'] ?>">
        <div class="form-control">
          <label for="">Kode</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="code" required value="<?=$standard->code?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Nama</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="name" required value="<?=$standard->name?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Penjelasan</label>
          <div class="input-wrapper">
            <textarea name="desc" id="desc" cols="30" rows="5" class="w-100" required><?=$standard->desc?></textarea>
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
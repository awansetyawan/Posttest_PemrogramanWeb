<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$auditor_id = $_GET['id'];
$auditor = find("auditors", $_GET['id']);

if (isset($_POST['email'])) {
  if($_FILES['photo']['name'] != '') {
    // * UPLOAD NEW FILE
    $photo = upload("photo", "../../storage/auditors/");
    // * DELETE OLD FILE
    unlink("../../storage/auditors/{$auditor->photo}");
    $_POST["photo"] = $photo;
  }
  update("auditors");
  flash("Ubah auditor berhasil!", "success");
  header("Location: ./show.php?id=$auditor_id");
}
?>

<section>
  <div class="alert alert-success mb-4">
    <p>Tidak perlu upload foto kembali apabila foto tidak berubah!</p>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Ubah Auditor</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="w-100" name="id" value="<?= $auditor->id ?>">
        <div class="form-control">
          <label for="">Nama Depan</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="first_name" required value="<?= $auditor->first_name ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Nama Belakang</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="last_name" required value="<?= $auditor->last_name ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Email</label>
          <div class="input-wrapper">
            <input type="email" class="w-100" name="email" required value="<?= $auditor->email ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Nomor Kontak</label>
          <div class="input-wrapper">
            <input type="tel" class="w-100" name="phone_number" required value="<?= $auditor->phone_number ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Lahir</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" name="birthday" required value="<?= $auditor->birthday ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Alamat</label>
          <div class="input-wrapper">
            <textarea name="address" id="address" cols="30" rows="5" class="w-100" required><?= $auditor->address ?></textarea>
          </div>
        </div>
        <div class="form-control">
          <label for="">Foto</label>
          <div class="input-wrapper">
            <input type="file" class="w-100" name="photo">
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
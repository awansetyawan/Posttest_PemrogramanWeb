<?php require_once('../../layouts/admin/header.php') ?>

<?php

  $company = find("companies", $_SESSION['user']->company_id);

  $user = find("users", $_SESSION['user']->id);

  if (isset($_POST['password_baru'])) {
    $isPasswordCorrect = password_verify($_POST['password_lama'], $user->password);
    if (!$isPasswordCorrect) {
      flash("Password Lama salah!", "error");
      header("Location: {$_SERVER['PHP_SELF']}");
      return;
    }
    if ($_POST['password_baru'] != $_POST['password_confirmation']) {
      flash("Password Baru dan Konfirmasi Password tidak sama!", "error");
      header("Location: {$_SERVER['PHP_SELF']}");
      return;
    }
    update("users", [
      "id" => $_SESSION['user']->id,
      "password" => password_hash($_POST['password_baru'], PASSWORD_DEFAULT),
    ]);
    flash("Ubah password berhasil!", "success");
    header("Location: ./index.php");
  }

?>

<section>
<div class="card mb-3">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Detail Company</h3>
      </div>
    </div>
    <div class="card-body">
      <div class="row descriptions">
        <div class="col col-12">
          <div class="description-item">
            <div class="description-label small">Nama Perusahaan</div>
            <div class="description-value"><?= $company->name ?></div>
          </div>
        </div>
        <div class="col col-12">
          <div class="description-item">
            <div class="description-label small">Registration Number</div>
            <div class="description-value"><?= $company->registration_number ?></div>
          </div>
        </div>
        <div class="col col-12">
          <div class="description-item">
            <div class="description-label small">Email Perusahaan</div>
            <div class="description-value"><?= $company->email ?></div>
          </div>
        </div>
        <div class="col col-12">
          <div class="description-item">
            <div class="description-label small">Nomor Kontak</div>
            <div class="description-value"><?= $company->phone_number ?></div>
          </div>
        </div>
        <div class="col col-12">
          <div class="description-item">
            <div class="description-label small">Alamat</div>
            <div class="description-value"><?= $company->address ?></div>
          </div>
        </div>
        <div class="col col-12">
          <div class="description-item">
            <div class="description-label small">Nomor FAX</div>
            <div class="description-value"><?= $company->fax_number ?></div>
          </div>
        </div>
        <div class="col col-12">
          <div class="description-item">
            <div class="description-label small">Homepage</div>
            <div class="description-value"><?= $company->homepage ?></div>
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
        <div class="form-control">
          <label for="">Password Lama</label>
          <div class="input-wrapper">
            <input type="password" class="w-100" name="password_lama" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Password Baru</label>
          <div class="input-wrapper">
            <input type="password" class="w-100" name="password_baru" required>
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
            <span>Ubah Password</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>
<?php require_once('../../layouts/admin/footer.php') ?>
<?php require_once('../../layouts/admin/header.php') ?>

<?php

  if (!isset($_GET['id'])) {
    header('Location: ./index.php');
  }

  $company = find("companies", $_GET['id']);

  if (isset($_POST['registration_number'])) {
    $company_id = update("companies");
    flash("{$company->registration_number} berhasil diubah!", "success");
    header("Location: ./index.php");
  }
?>

<section>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Ubah Data Company</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST">
        <input type="hidden" name="id" value="<?= $company->id ?>">
        <div class="form-control">
          <label for="">Registration Number</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="registration_number" readonly value="<?= $company->registration_number ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Nama Perusahaan</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="name" required value="<?= $company->name ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Email Perusahaan</label>
          <div class="input-wrapper">
            <input type="email" class="w-100" name="email" required value="<?= $company->email ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Nomor Kontak</label>
          <div class="input-wrapper">
            <input type="tel" class="w-100" name="phone_number" required value="<?= $company->phone_number ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Alamat</label>
          <div class="input-wrapper">
            <textarea name="address" id="address" cols="30" rows="5" class="w-100" required><?= $company->address ?></textarea>
          </div>
        </div>
        <div class="form-control">
          <label for="">Nomor FAX</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="fax_number" value="<?= $company->fax_number ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Homepage</label>
          <div class="input-wrapper">
            <input type="url" class="w-100" name="homepage" value="<?= $company->homepage ?>">
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
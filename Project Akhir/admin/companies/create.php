<?php require_once('../../layouts/admin/header.php') ?>

<?php
if (isset($_POST['registration_number'])) {
  $registrationNumExist = query("SELECT * FROM companies WHERE registration_number='{$_POST['registration_number']}'");
  if (!empty($registrationNumExist)) {
    flash("Registration Number sudah ada!", "error");
    header('Location: ' . $_SERVER['PHP_SELF']);
  }
  $company_id = store("companies", [], true);
  $user = store("users", [
    "username" => $_POST['registration_number'],
    "password" => password_hash($_POST['registration_number'], PASSWORD_DEFAULT),
    "role" => 3,
    "company_id" => $company_id
  ]);
  flash("Registrasi berhasil! Silahkan melanjutkan ketahap pendaftaran examination", "success");
  header("Location: ../examinations/create.php?company_id=$company_id");
}
?>

<section>
  <div class="alert alert-success mb-4">
    <p>Akun akan otomatis dibuat dengan username dan password default yaitu <b>Registration Number</b></p>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Registrasi</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST">
        <div class="form-control">
          <label for="">Registration Number</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="registration_number" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Nama Perusahaan</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="name" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Email Perusahaan</label>
          <div class="input-wrapper">
            <input type="email" class="w-100" name="email" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Nomor Kontak</label>
          <div class="input-wrapper">
            <input type="tel" class="w-100" name="phone_number" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Alamat</label>
          <div class="input-wrapper">
            <textarea name="address" id="address" cols="30" rows="5" class="w-100" required></textarea>
          </div>
        </div>
        <div class="form-control">
          <label for="">Nomor FAX</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="fax_number">
          </div>
        </div>
        <div class="form-control">
          <label for="">Homepage</label>
          <div class="input-wrapper">
            <input type="url" class="w-100" name="homepage">
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
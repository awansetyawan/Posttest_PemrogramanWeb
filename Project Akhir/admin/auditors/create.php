<?php require_once('../../layouts/admin/header.php') ?>

<?php
if (isset($_POST['email'])) {
  $emailExist = query("SELECT * FROM auditors WHERE email='{$_POST['email']}'");
  if (!empty($emailExist)) {
    flash("Auditor dengan email tersebut sudah terdaftar!", "error");
    header('Location: ' . $_SERVER['PHP_SELF']);
  }

  $first_name = str_replace(' ', '_', $_POST['first_name']);
  $last_name = str_replace(' ', '_', $_POST['last_name']);
  $username = strtolower($first_name) . '.' . strtolower($last_name);
  $photo = upload("photo", "../../storage/auditors/");
  $auditor_id = store("auditors", [
    "first_name"   => $_POST['first_name'],
    "last_name"    => $_POST['last_name'],
    "email"        => $_POST['email'],
    "phone_number" => $_POST['phone_number'],
    "birthday"     => $_POST['birthday'],
    "address"      => $_POST['address'],
    "photo"        => $photo,
  ], true);

  $user = store("users", [
    "username" => $username,
    "password" => password_hash($username, PASSWORD_DEFAULT),
    "role" => 2,
    "auditor_id" => $auditor_id
  ]);
  flash("Tambah auditor berhasil! Username: <b>$username</b>", "success");
  header("Location: ./show.php?id=$auditor_id");
}
?>

<section>
  <div class="alert alert-success mb-4">
    <p>Akun akan otomatis dibuat dengan username dan password default yaitu <b>nama_depan.nama_belakang</b></p>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Tambah Auditor</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST" enctype="multipart/form-data">
        <div class="form-control">
          <label for="">Nama Depan</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="first_name" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Nama Belakang</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="last_name" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Email</label>
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
          <label for="">Tanggal Lahir</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" name="birthday" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Alamat</label>
          <div class="input-wrapper">
            <textarea name="address" id="address" cols="30" rows="5" class="w-100" required></textarea>
          </div>
        </div>
        <div class="form-control">
          <label for="">Foto</label>
          <div class="input-wrapper">
            <input type="file" class="w-100" name="photo" required>
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
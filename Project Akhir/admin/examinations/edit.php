<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['id']) && !isset($_POST['id'])) {
  header('Location: ./index.php');
}

$examination = examination_show($_GET['id']);
$company = find("companies", $examination->company_id);
$standards = all("standards");
$scopes = all("scopes");

$scope_ids = array_map(function($scope) {
  return $scope->scope_id;
}, $examination->scopes);

$scope_codes = join(", ", array_map(function($scope) {
  return $scope->scope_code;
}, $examination->scopes));

if (isset($_POST['examination_number'])) {
  $examinationNumExist = query("SELECT * FROM examinations WHERE examination_number='{$_POST['examination_number']}' AND id != {$_GET['id']}");
  if (!empty($examinationNumExist)) {
    flash("Examination Number sudah ada!", "error");
    header('Location: ' . $_SERVER['PHP_SELF']);
  }

  $dates = explode("-", $_POST['examination_end_date']);
  $year = $dates[0] + 3;
  $expiration_date = "{$year}-{$dates[1]}-{$dates[2]}";
  
  update("examinations", [
    "id"                     => $_GET['id'],
    "standard_id"            => $_POST['standard_id'],
    "examination_number"     => $_POST['examination_number'],
    "registration_date"      => $_POST['registration_date'],
    "expiration_date"        => $expiration_date,
    "examination_start_date" => $_POST['examination_start_date'],
    "examination_end_date"   => $_POST['examination_end_date']
  ]);

  $examination_scope_ids = array_map(function($scope) {
    return $scope->examination_scope_id;
  }, $examination->scopes);

  // * DELETE SCOPES
  delete_bulk("examination_scopes", $examination_scope_ids);

  // * SCOPES
  foreach($_POST['scopes'] as $scope_id) {
    store("examination_scopes", [
      "examination_id" => $_GET['id'],
      "scope_id" => $scope_id
    ]);
  }

  flash("Data examination berhasil diubah!", "success");
  header("Location: ../examinations/show.php?id={$_GET['id']}");
}

?>

<section id="registration">
  <div class="card mb-3">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Detail Singkat Company</h3>
      </div>
    </div>
    <div class="card-body">
      <div class="row descriptions">
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Nama Perusahaan</div>
            <div class="description-value"><?= $company->name ?></div>
          </div>
        </div>
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Registration Number</div>
            <div class="description-value"><?= $company->registration_number ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="alert alert-success mb-4">
    <p>Sertifikat hanya akan berlaku selama <b>3 Tahun</b> setelah tanggal selesai examination</p>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Ubah Data Examination</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST">
        <input type="hidden" name="id" value="<?= $_GET['id']?>">
        <div class="form-control">
          <label for="">Standar</label>
          <div class="input-wrapper">
            <select name="standard_id" class="select2 w-100" required>
              <?php foreach($standards as $standard): ?>
                <option
                  <?= $examination->standard_id == $standard->id ? 'selected' : '' ?>
                  value="<?= $standard->id ?>"
                >
                  <?= $standard->name ?> (<?= $standard->code ?>)
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-control">
          <label for="">Examination Number</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="examination_number" required placeholder="[Kode Standard][Registration Number][Ke-]" value="<?= $examination->examination_number ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Registrasi</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" name="registration_date" required  value="<?= $examination->registration_date ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Mulai Examination</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" name="examination_start_date" required  value="<?= $examination->examination_start_date ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Selesai Examination</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" id="examination_end_date" name="examination_end_date" required  value="<?= $examination->examination_end_date ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Kadaluwarsa Sertifikat</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" id="expiration_date" name="expiration_date" disabled  value="<?= $examination->expiration_date ?>">
          </div>
        </div>
        <div class="form-control">
          <label for="">Lingkup Pengujian</label>
          <div class="input-wrapper d-flex align-items-start flex-column">
            <div id="selected-scopes" class="bg-gray w-100 pl-1">
              <p>Terpilih: <span><?= $scope_codes ?></span></p>
            </div>
            <div class="w-100" id="registration-scopes">
              <?php foreach($scopes as $scope): ?>
                <div class="registration-scope">
                  <input
                    type="checkbox"
                    name="scopes[]"
                    data-code="<?= $scope->code ?>"
                    value="<?= $scope->id ?>" id="scope<?= $scope->id ?>"
                    class="regist-scope"
                    <?= in_array($scope->id, $scope_ids) ? 'checked' : '' ?>
                  >
                  <label for="scope<?= $scope->id ?>"><?= $scope->code ?> <?= $scope->name ?></label>
                </div>
              <?php endforeach; ?>
            </div>
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
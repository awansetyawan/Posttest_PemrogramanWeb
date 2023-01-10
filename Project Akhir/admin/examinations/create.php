<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['company_id']) && !isset($_POST['company_id'])) {
  header('Location: ./index.php');
}

$company = find("companies", $_GET['company_id']);
$standards = all("standards");
$scopes = all("scopes");


if (isset($_POST['examination_number'])) {
  $examinationNumExist = query("SELECT * FROM examinations WHERE examination_number='{$_POST['examination_number']}'");
  if (!empty($examinationNumExist)) {
    flash("Examination Number sudah ada!", "error");
    header('Location: ' . $_SERVER['PHP_SELF']);
  }

  $dates = explode("-", $_POST['examination_end_date']);
  $year = $dates[0] + 3;
  $expiration_date = "{$year}-{$dates[1]}-{$dates[2]}";
  
  $examination_id = store("examinations", [
    "company_id"             => $_GET['company_id'],
    "standard_id"            => $_POST['standard_id'],
    "examination_number"     => $_POST['examination_number'],
    "registration_date"      => $_POST['registration_date'],
    "expiration_date"        => $expiration_date,
    "examination_start_date" => $_POST['examination_start_date'],
    "examination_end_date"   => $_POST['examination_end_date'],
    "status"                 => 1
  ], true);

  // * SCOPES
  foreach($_POST['scopes'] as $scope_id) {
    store("examination_scopes", [
      "examination_id" => $examination_id,
      "scope_id" => $scope_id
    ]);
  }

  flash("Examination berhasil diregistrasi! Silahkan melanjutkan ketahap penjadwalan", "success");
  header("Location: ../examinations-schedule/create.php?examination_id=$examination_id");
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
        <h3>Pendaftaran Examination</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST">
        <input type="hidden" name="company_id" value="<?= $_GET['company_id']?>">
        <div class="form-control">
          <label for="">Standar</label>
          <div class="input-wrapper">
            <select name="standard_id" class="select2 w-100" required>
              <?php foreach($standards as $standard): ?>
                <option value="<?= $standard->id ?>"><?= $standard->name ?> (<?= $standard->code ?>)</option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-control">
          <label for="">Examination Number</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="examination_number" required placeholder="[Kode Standard][Registration Number][Ke-]">
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Registrasi</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" name="registration_date" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Mulai Examination</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" name="examination_start_date" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Selesai Examination</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" id="examination_end_date" name="examination_end_date" required>
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Kadaluwarsa Sertifikat</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" id="expiration_date" name="expiration_date" disabled>
          </div>
        </div>
        <div class="form-control">
          <label for="">Lingkup Pengujian</label>
          <div class="input-wrapper d-flex align-items-start flex-column">
            <div id="selected-scopes" class="bg-gray w-100 pl-1">
              <p>Terpilih: <span></span></p>
            </div>
            <div class="w-100" id="registration-scopes">
              <?php foreach($scopes as $scope): ?>
                <div class="registration-scope">
                  <input type="checkbox" name="scopes[]" data-code="<?= $scope->code ?>" value="<?= $scope->id ?>" id="scope<?= $scope->id ?>" class="regist-scope">
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
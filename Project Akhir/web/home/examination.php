<?php
include_once('../../core/functions.php');


if (!isset($_GET['examination_number'])) {
  header("Location: ./index.php");
}

$examination_number = $_GET['examination_number'];
$isExaminationExist = query("SELECT id FROM examinations WHERE examination_number='$examination_number'");

if (empty($isExaminationExist)) {
  $examination = null;
} else {
  $examination_id = $isExaminationExist[0]->id;
  $examination = examination_show($examination_id);
  $company = find("companies", $examination->company_id);
}
?>

<?php require_once('../../layouts/web/header.php') ?>

<!-- Products Start -->
<main class="container-fluid">
  <h1 class="heading">Pencarian Sertifikasi Perusahaan (Detail Informasi)</h1>

  <section  style="margin-top: 5rem; margin-bottom: 10rem;">
    <div class="row descriptions">
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Nama Perusahaan</div>
          <div class="description-value"><?= $examination->company_name ?></div>
        </div>
      </div>
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Registration Number</div>
          <div class="description-value"><?= $examination->registration_number ?></div>
        </div>
      </div>
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Examination Number</div>
          <div class="description-value"><?= $examination->examination_number ?></div>
        </div>
      </div>
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Tanggal Registrasi</div>
          <div class="description-value"><?= format_date($examination->registration_date) ?></div>
        </div>
      </div>
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Tanggal Mulai Examination</div>
          <div class="description-value"><?= format_date($examination->examination_start_date) ?></div>
        </div>
      </div>
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Tanggal Selesai Examination</div>
          <div class="description-value"><?= format_date($examination->examination_end_date) ?></div>
        </div>
      </div>
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Tanggal Kadaluwarsa Sertifikat</div>
          <div class="description-value"><?= format_date($examination->expiration_date) ?></div>
        </div>
      </div>
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Standar</div>
          <div class="description-value"><?= $examination->standard_name ?></div>
        </div>
      </div>
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Status Pengerjaan</div>
          <div class="description-value"><?= $examination->status_label ?></div>
        </div>
      </div>
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Alamat</div>
          <div class="description-value"><?= $company->address ?></div>
        </div>
      </div>
      <div class="col col-12">
        <div class="description-item">
          <div class="description-label">Lingkup Pengerjaan</div>
          <div class="description-value">
            <?php $scope = array_map(function($scope) { return $scope->scope_name; }, $examination->scopes) ?>
            <?= join(", ", $scope) ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once('../../layouts/web/footer.php') ?>
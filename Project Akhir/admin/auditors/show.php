<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$auditor_id = $_GET['id'];
$auditor = find("auditors", $_GET['id']);
$qualifications = query("
  SELECT
    auditor_qualifications.*,
    standards.name as standard_name
  FROM
    auditor_qualifications
    JOIN standards ON auditor_qualifications.standard_id = standards.id
    WHERE auditor_qualifications.auditor_id = $auditor_id
");

$examinations = examination_list("GROUP BY examination_auditors.examination_id", [
  'with_auditors' => true,
  'with_schedules' => true,
  'auditor_id' => $auditor_id
]);

?>

<section>
  <div class="card mb-3">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Detail Auditor</h3>
      </div>
    </div>
    <div class="card-body">
      <div class="row descriptions">
        <div class="col col-2">
          <img src="../../storage/auditors/<?= $auditor->photo ?>" alt="">
        </div>
        <div class="col col-10">
          <div class="row descriptions">
            <div class="col col-6">
              <div class="description-item">
                <div class="description-label">Nama Depan</div>
                <div class="description-value"><?= $auditor->first_name ?></div>
              </div>
            </div>
            <div class="col col-6">
              <div class="description-item">
                <div class="description-label">Nama Belakang</div>
                <div class="description-value"><?= $auditor->last_name ?></div>
              </div>
            </div>
            <div class="col col-12">
              <div class="description-item">
                <div class="description-label">Email</div>
                <div class="description-value"><?= $auditor->email ?></div>
              </div>
            </div>
            <div class="col col-12">
              <div class="description-item">
                <div class="description-label">No. Kontak</div>
                <div class="description-value"><?= $auditor->phone_number ?></div>
              </div>
            </div>
            <div class="col col-12">
              <div class="description-item">
                <div class="description-label">Tanggal Lahir</div>
                <div class="description-value"><?= format_date($auditor->birthday) ?></div>
              </div>
            </div>
            <div class="col col-12">
              <div class="description-item">
                <div class="description-label">Alamat</div>
                <div class="description-value"><?= $auditor->address ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Kualifikasi Auditor</h3>
        <a href="../auditors-qualification/create.php?auditor_id=<?= $auditor_id ?>" class="btn btn-outline-primary">
          <i class="fa-solid fa-address-card"></i>
          <span>Tambah Kualifikasi</span>
        </a>
      </div>
    </div>
    <div class="card-body">
      <table id="auditor-qualifications" class="datatable">
        <thead>
          <tr>
            <th>Standard</th>
            <th>Tanggal Kadaluarsa</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($qualifications as $qualification) : ?>
            <tr>
              <td><?= $qualification->standard_name ?></td>
              <td><?= format_date($qualification->expiration_date) ?></td>
              <td>
                <div class="p-1 d-flex align-items-center">
                  <a href="../auditors-qualification/edit.php?id=<?= $qualification->id ?>" class="btn btn-sm btn-warning mr-1">
                    <i class="fa-solid fa-pen ml-1"></i>
                  </a>
                  <a data-url="../../admin/auditors-qualification/delete.php?id=<?= $qualification->id ?>" class="btn btn-sm btn-danger mr-1 delete-btn">
                    <i class="fa-solid fa-trash-can ml-1"></i>
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach ?>

        </tbody>
      </table>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Histori Examination</h3>
      </div>
    </div>
    <div class="card-body">
      <table id="auditor-examinations" class="datatable">
        <thead>
          <tr>
            <th>Status</th>
            <th>Nama Perusahaan</th>
            <th>Registration Number</th>
            <th>Examination Number</th>
            <th>Auditor</th>
            <th>Tanggal</th>
            
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($examinations as $examination) : ?>
            <tr>
              <td><?= $examination->status_label ?></td>
              <td><?= $examination->company_name ?></td>
              <td><?= $examination->registration_number ?></td>
              <td><?= $examination->examination_number ?></td>
              <td>
                <?php foreach ($examination->auditors as $auditor) : ?>
                  <span><?= $auditor->name ?></span><br>
                <?php endforeach ?>
              </td>
              <td><?= format_date($examination->examination_start_date, "d/m/Y") ?> ~ <?= format_date($examination->examination_end_date, "d/m/Y") ?></td>
              <td>
                <a href="./show.php?id=<?= $examination->id ?>" class="btn btn-sm btn-info mr-1">
                  <i class="fa-solid fa-circle-info"></i>
                </a>
              </td>
            </tr>
          <?php endforeach ?>

        </tbody>
      </table>
    </div>
  </div>
</section>
<?php require_once('../../layouts/admin/footer.php') ?>
<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$company = find("companies", $_GET['id']);
$examinations = examination_list("WHERE companies.id = {$company->id}", ['with_auditors' => true, 'with_scopes' => true]);

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
        <h3>Histori Examination</h3>
      </div>
    </div>
    <div class="card-body">
      <table class="datatable">
        <thead>
          <tr>
            <th>Status</th>
            <th>Examination Number</th>
            <th>Scope</th>
            <th>Auditor</th>
            <th>Tanggal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($examinations as $examination) : ?>
            <tr>
              <td><?= $examination->status_label ?></td>
              <td><?= $examination->examination_number ?></td>
              <td>
                <?php foreach ($examination->scopes as $scope) : ?>
                  <span><?= $scope->scope_code ?>,</span>
                <?php endforeach ?>
              </td>
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
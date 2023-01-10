<?php require_once('../../layouts/admin/header.php') ?>

<?php
  $company_id = $_SESSION['user']->company_id;
  $examinations = examination_list("WHERE examinations.company_id=$company_id", [
    'with_auditors' => true,
    'with_schedules' => true
  ]);
?>

<section>
  <div class="card">
    <div class="card-header">
      <h3>Histori Examination</h3>
    </div>
    <div class="card-body">
      <div class="table-wrapper">

      <table class="datatable">
          <thead>
            <tr>
              <th>Status</th>
              <th>Company</th>
              <th>Examination Number</th>
              <th>Registration Number</th>
              <th>Standar</th>
              <th>Auditor</th>
              <th>Tanggal</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($examinations as $examination): ?>
              <tr>
                <td><?= $examination->status_label ?></td>
                <td><?= $examination->company_name ?></td>
                <td><?= $examination->registration_number ?></td>
                <td><?= $examination->examination_number ?></td>
                <td><?= $examination->standard_name ?></td>
                <td> 
                  <?php foreach($examination->auditors as $auditor): ?>
                    <span><?= $auditor->name ?></span><br>
                  <?php endforeach ?>
                </td>
                <td><?= format_date($examination->examination_start_date, "d/m/Y") ?> ~ <?= format_date($examination->examination_end_date, "d/m/Y") ?></td>
                <td>
                  <div class="p-1 d-flex align-items-center">
                    <a href="./show.php?id=<?= $examination->id ?>" class="btn btn-sm btn-secondary mr-1">
                      <i class="fa-solid fa-circle-info"></i>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<?php require_once('../../layouts/admin/footer.php') ?>
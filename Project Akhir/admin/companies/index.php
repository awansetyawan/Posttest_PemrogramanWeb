<?php require_once('../../layouts/admin/header.php') ?>

<?php
$companies = all("companies");
?>

<section>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Daftar Company</h3>
        <a href="./create.php" class="btn btn-outline-primary">
          <i class="fa-solid fa-building-circle-arrow-right"></i>
          <span>Registrasi</span>
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-wrapper">

        <table class="datatable">
          <thead>
            <tr>
              <th>Registration Number</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Kontak</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($companies as $company) : ?>
              <tr>
                <td><?= $company->registration_number ?></td>
                <td><?= $company->name ?></td>
                <td><?= $company->email ?></td>
                <td><?= $company->phone_number ?></td>
                <td>
                  <div class="p-1 d-flex align-items-center">
                    <a href="./show.php?id=<?= $company->id ?>" class="btn btn-sm btn-secondary mr-1">
                      <i class="fa-solid fa-circle-info"></i>
                    </a>
                    <a href="./edit.php?id=<?= $company->id ?>" class="btn btn-sm btn-warning mr-1">
                      <i class="fa-solid fa-pen ml-1"></i>
                    </a>
                    <a data-url="../../admin/companies/delete.php?id=<?= $company->id ?>" class="btn btn-sm btn-danger mr-1 delete-btn">
                      <i class="fa-solid fa-trash-can ml-1"></i>
                    </a>
                    <a href="../examinations/create.php?company_id=<?= $company->id ?>" class="btn btn-sm btn-info">
                      <i class="fa-solid fa-folder-plus"></i>
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
<?php

session_start();
session_destroy();
include_once('../../core/functions.php');

if (isset($_GET['search']) && $_GET['search'] != '') {
  $search = htmlspecialchars($_GET['search']);
  $examinations = examination_list("WHERE companies.name LIKE '%$search%'");
} else {
  $examinations = [];
}
?>

<?php require_once('../../layouts/web/header.php') ?>

<!-- Products Start -->
<main class="container-fluid">
  <h1 class="heading">Pencarian Sertifikasi Perusahaan</h1>


  <section style="margin-top: 5rem;">
    <h2 class="sub-heading">Pencarian</h2>
    <hr class="mb-4">
    <div class="bg-gray p-4">
      <form class="form" action="">
        <div class="form-control">
          <label for="">Nama Perusahaan</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="search" value="<?= $_GET['search'] ?? '' ?>" autocomplete="off">
          </div>
        </div>

        <div class="text-right mt-3">
          <button class="btn" type="submit">
            <i class="fa-solid fa-search mr-2"></i>
            <span>Cari</span>
          </button>
        </div>
      </form>
    </div>
  </section>

  <section style="margin-top: 5rem; margin-bottom: 10rem;">
    <h2 class="sub-heading">Hasil Pencarian</h2>
    <hr class="mb-4">
    <table class="datatable-min">
      <thead>
        <tr>
          <th>Registration Number</th>
          <th>Nama Perusahaan</th>
          <th>Examination Number</th>
          <th>Standar</th>
          <th>Tanggal Examination</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($examinations as $examination) : ?>
          <tr>
            <td><?= $examination->registration_number ?></td>
            <td><?= $examination->company_name ?></td>
            <td><?= $examination->examination_number ?></td>
            <td><?= $examination->standard_name ?></td>
            <td><?= format_date($examination->examination_start_date) ?> ~ <?= format_date($examination->examination_end_date) ?></td>
            <td>
              <div class="p-1 d-flex align-items-center">
                <a href="./examination.php?examination_number=<?= $examination->examination_number ?>" class="btn btn-sm btn-secondary mr-1">
                  <i class="fa-solid fa-circle-info"></i>
                </a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</main>

<?php require_once('../../layouts/web/footer.php') ?>
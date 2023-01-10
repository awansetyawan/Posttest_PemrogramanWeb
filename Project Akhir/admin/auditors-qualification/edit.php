<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['id'])) {
  header('Location: ../auditors/index.php');
}

$qualification = find("auditor_qualifications", $_GET['id']);
$auditor = find("auditors", $qualification->auditor_id);
$standards = all("standards");

if (isset($_POST['standard_id'])) {
  update("auditor_qualifications");
  flash("Ubah kualifikasi auditor berhasil!", "success");
  header("Location: ../auditors/show.php?id=" . $qualification->auditor_id);
}

?>

<section>
  <div class="card mb-3">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Ubah Kualifikasi Auditor</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $qualification->id ?>">
        <input type="hidden" name="auditor_id" value="<?= $qualification->auditor_id ?>">
        <div class="form-control">
          <label for="">Standar</label>
          <div class="input-wrapper">
            <select name="standard_id" class="select2 w-100" required>
              <?php foreach ($standards as $standard) : ?>
                <option
                  <?= $qualification->standard_id == $standard->id ? 'selected' : '' ?>
                  value="<?= $standard->id ?>"
                >
                  <?= $standard->name ?> (<?= $standard->code ?>)
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-control">
          <label for="">Tanggal Kadaluarsa</label>
          <div class="input-wrapper">
            <input type="date" class="w-100" name="expiration_date" required value="<?= $qualification->expiration_date ?>">
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

  <div class="card">
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
</section>
<?php require_once('../../layouts/admin/footer.php') ?>
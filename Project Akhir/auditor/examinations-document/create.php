<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['examination_id']) || !isset($_GET['document_type'])) {
  header('Location: ../examinations/index.php');
}

$document_type = $_GET['document_type'];
$examination_id = $_GET['examination_id'];

$document_type_name = [
  '1' => 'Approval ITCCM',
  '2' => 'Examination Plan Auditor',
  '3' => 'Pembayaran Company',
][$document_type];

$examination = examination_show($examination_id);

if (isset($_FILES['document'])) {
  $document_type_label = [
    '1' => 'approval',
    '2' => 'examination_plan',
    '3' => 'payment',
  ][$document_type];

  $prefix = $examination->examination_number . "-" . $document_type_label;
  $file = upload("document", "../../storage/examinations/", $prefix);

  store("examination_documents", [
    "examination_id" => $examination_id,
    "document_type" => $document_type,
    "uploaded_at" => date('Y-m-d H:i:s'),
    "file" => $file
  ]);

  // * UPDATE EXAMINATION STATUS
  update("examinations", [
    "id" => $examination_id,
    "status" => 3
  ]);

  flash("Tambah dokumen {$document_type_name} berhasil!", "success");
  header("Location: ../examinations/show.php?id=$examination_id");
}
?>

<section>
  <div class="card mb-3">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Detail Singkat Examination</h3>
      </div>
    </div>
    <div class="card-body">
      <div class="row descriptions">
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Nama Perusahaan</div>
            <div class="description-value"><?= $examination->company_name ?></div>
          </div>
        </div>
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Periode</div>
            <div class="description-value"><?= format_date($examination->examination_start_date, "d/m/Y") ?> ~ <?= format_date($examination->examination_end_date, "d/m/Y") ?></div>
          </div>
        </div>
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Registration Number</div>
            <div class="description-value"><?= $examination->registration_number ?></div>
          </div>
        </div>
        <div class="col col-6">
          <div class="description-item">
            <div class="description-label">Examination Number</div>
            <div class="description-value"><?= $examination->examination_number ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="alert alert-success mb-3">File dalam bentuk PDF</div>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Tambah Dokumen</h3>
      </div>
    </div>
    <div class="card-body">
      <form class="form" action="" method="POST" enctype="multipart/form-data">
        <div class="form-control">
          <label for="">Tipe Dokumen</label>
          <div class="input-wrapper">
            <input type="text" class="w-100" name="document_type" value="<?= $document_type_name ?>" readonly>
          </div>
        </div>
        <div class="form-control">
          <label for="">File</label>
          <div class="input-wrapper">
            <input type="file" class="w-100" name="document" required accept="application/pdf">
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
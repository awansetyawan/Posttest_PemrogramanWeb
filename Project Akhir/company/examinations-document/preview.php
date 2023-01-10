<?php require_once('../../layouts/admin/header.php') ?>

<?php

if (!isset($_GET['id'])) {
  header('Location: ../examinations/index.php');
}

$document = find("examination_documents", $_GET['id']);
?>

<section>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Preview Dokumen</h3>
      </div>
    </div>
    <div class="card-body">
      <object data="../../storage/examinations/<?= $document->file ?>" type="application/pdf" style="display:block; width:100%; height:100vh;">
        <iframe
          src="https://docs.google.com/viewer?url=../../storage/examinations/<?= $document->file ?>&embedded=true"
          frameborder="0" scrolling="yes" seamless="seamless" style="display:block; width:100%; height:100vh;"
        ></iframe>
      </object>
    </div>
  </div>
</section>
<?php require_once('../../layouts/admin/footer.php') ?>
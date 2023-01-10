<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ../examinations/index.php');
}

$document = find("examination_documents", $_GET['id']);
$examination_id = $document->examination_id;
$result = delete("examination_documents", $_GET['id']);

unlink("../../storage/examinations/{$document->file}");
flash("Dokumen berhasil dihapus!", "success");
header("Location: ../examinations/show.php?id={$examination_id}");

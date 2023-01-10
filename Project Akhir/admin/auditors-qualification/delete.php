<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ../auditors/index.php');
}

$qualification = find("auditor_qualifications", $_GET['id']);
$result = delete("auditor_qualifications", $_GET['id']);
flash("Kualifikasi auditor berhasil dihapus!", "success");
header("Location: ../auditors/show.php?id=" . $qualification->auditor_id);

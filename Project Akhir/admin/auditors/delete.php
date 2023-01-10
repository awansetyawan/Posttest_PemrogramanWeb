<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$auditor = find("auditors", $_GET['id']);
$result = delete("auditors", $_GET['id']);

unlink("../../storage/auditors/{$auditor->photo}");
flash("{$auditor->first_name} {$auditor->last_name} berhasil dihapus!", "success");
header("Location: ./index.php");

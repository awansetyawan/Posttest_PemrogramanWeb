<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$company = find("companies", $_GET['id']);
$result = delete("companies", $_GET['id']);
flash("{$company->registration_number} berhasil dihapus!", "success");
header("Location: ./index.php");

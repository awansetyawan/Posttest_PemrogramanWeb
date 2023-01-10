<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$examination = find("examinations", $_GET['id']);
$result = delete("examinations", $_GET['id']);
flash("{$examination->examination_number} berhasil dihapus!", "success");
header("Location: ./index.php");

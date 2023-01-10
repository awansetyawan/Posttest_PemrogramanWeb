<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$standard = find("standards", $_GET['id']);
$result = delete("standards", $_GET['id']);
flash("{$standard->name} berhasil dihapus!", "success");
header("Location: ./index.php");
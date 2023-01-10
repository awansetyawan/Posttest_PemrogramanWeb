<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$scope = find("scopes", $_GET['id']);
$result = delete("scopes", $_GET['id']);
flash("{$scope->name} Berhasil Dihapus!", "success");
header("Location: ./index.php");

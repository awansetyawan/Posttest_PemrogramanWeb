<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$user = find("users", $_GET['id']);
$result = delete("users", $_GET['id']);
flash("{$user->username} berhasil dihapus!", "success");
header("Location: ./index.php");

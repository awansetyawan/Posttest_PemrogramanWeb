<?php
session_start();
include("../../core/functions.php");

$link = $_SERVER['PHP_SELF'];
$link_array = explode('/', $link);

if (!$_SESSION['is_login']) {
  header("location:../../index.php");
}

$role = [
  '1' => 'admin',
  '2' => 'auditor',
  '3' => 'company'
][$_SESSION['user']->role];

if(!in_array($role, $link_array)) {
  header("Location:../../{$role}/dashboard/index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ITCCM | Indonesia Testing Center for Construction Materials</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="ITCCM | Indonesia Testing Center for Construction Materials" name="keywords">
  <meta content="ITCCM | Indonesia Testing Center for Construction Materials" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/298ddad7ce.js" crossorigin="anonymous"></script>

  <!-- SELECT2 -->
  <link href="../../assets/vendor/select2/style.min.css" rel="stylesheet" />

  <!-- DATATABLE -->
  <link href="../../assets/vendor/datatable/style.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="../../assets/css/utility.css" rel="stylesheet">
  <link href="../../assets/css/admin.css" rel="stylesheet">
</head>

<body>
  <main class="min-h-100">
    <?php require_once('navbar.php') ?>
    <div class="row bg-gray">
      <?php require_once('sidebar.php') ?>
      <div class="col-11 p-4 bg-gray mt-3" style="overflow: hidden!important;">
        <div class="mb-3">
          <?php require_once('../../layouts/component/flash.php') ?>
        </div>

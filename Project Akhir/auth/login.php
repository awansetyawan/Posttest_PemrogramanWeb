<?php

session_start();
include_once('../core/config.php');
include_once('../core/functions.php');

if (isset($_SESSION['is_login'])) {
  
  $redirect = [
    '1' => 'admin',
    '2' => 'auditor',
    '3' => 'company'
  ][$_SESSION['user']->role];
  header("Location:../{$redirect}/dashboard/index.php");
}

if (isset($_POST['username'])) {
  $user = query("SELECT * FROM users WHERE username='{$_POST['username']}'");

  if(empty($user)) {
    flash('Username tidak ada!', 'error');
    header("Location:./login.php");
  }

  $user = $user[0];
  $isPasswordCorrect = password_verify($_POST['password'], $user->password);
  if(!$isPasswordCorrect) {
    flash('Password salah!', 'error');
    header("Location:./login.php");
    return;
  }

  $_SESSION['user'] = $user;
  $_SESSION['is_login'] = true;

  $redirect = [
    '1' => 'admin',
    '2' => 'auditor',
    '3' => 'company'
  ][$user->role];

  header("Location:../{$redirect}/dashboard/index.php");
}
?>
<?php require_once('../layouts/auth/header.php') ?>
<div id="login-container" class="min-h-100 d-flex align-items-center justify-content-center">
  <div class="card" style="min-width: 30rem;">
    <div class="card-body">
      <div class="text-center">
        <img src="../assets/img/logo_horizontal.png" alt="" style="height: 60px;">
      </div>
      <hr>
      <?php require_once('../layouts/component/flash.php') ?>
      <form class="form mt-4" action="" method="POST">
        <div class="form-control">
          <input type="text" name="username" class="w-100" placeholder="Username" required>
        </div>
        <div class="form-control mt-3">
          <input type="password" name="password" class="w-100" placeholder="Password" required>
        </div>
        <div class="form-control mt-4">
          <button type="submit" class="btn btn-secondary text-white w-100">Masuk</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require_once('../layouts/auth/footer.php') ?>
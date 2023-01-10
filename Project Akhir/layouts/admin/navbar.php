<nav id="navbar" class="row">
  <a href="" class="col-2 p-2">
    <img src="../../assets/img/logo_horizontal.png" alt="" style="height: 50px;">
  </a>
  <div class="d-flex align-items-center justify-content-end col-10">
    <p class="mr-3"><?= $_SESSION['user']->username ?></p>
    <a href="../../auth/logout.php" class="logout-btn">
      <i class="fa-solid fa-right-from-bracket mr-2"></i>
      <span>Logout</span>
    </a>
  </div>
</nav>
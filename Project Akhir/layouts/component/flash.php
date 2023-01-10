<?php if(isset($_SESSION['flash']['success'])): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i>
    <span><?php echo $_SESSION['flash']['success']; ?></span>
  </div>
<?php endif; ?>

<?php if(isset($_SESSION['flash']['error'])): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i>
    <span><?php echo $_SESSION['flash']['error']; ?></span>
  </div>
<?php endif; ?>

<?php unset($_SESSION['flash']); ?>

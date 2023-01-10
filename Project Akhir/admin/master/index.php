<?php require_once('../../layouts/admin/header.php') ?>
<section>
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h3>Data Master</h3>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <a href="../master-users/index.php" class="col col-4">
          <div class="card bg-accent m-2">
            <div class="card-body d-flex align-items-center justify-content-center flex-column">
              <i class="fa-solid fa-users-gear fa-4x text-white"></i>
              <h3 class="m-0 mt-3 text-white">Data User</h3>
              <p class="text-white mb-0 mt-1">Kelola user dan ubah password</p>
            </div>
          </div>
        </a>
        <a href="../master-standards/index.php" class="col col-4">
          <div class="card bg-accent m-2">
            <div class="card-body d-flex align-items-center justify-content-center flex-column">
              <i class="fa-solid fa-stamp fa-4x text-white"></i>
              <h3 class="m-0 mt-3 text-white">Data Standar</h3>
              <p class="text-white mb-0 mt-1">Daftar standar sertifikasi ITCCM</p>
            </div>
          </div>
        </a>
        <a href="../master-scopes/index.php" class="col col-4">
          <div class="card bg-accent m-2">
            <div class="card-body d-flex align-items-center justify-content-center flex-column">
              <i class="fa-solid fa-circle-nodes fa-4x text-white"></i>
              <h3 class="m-0 mt-3 text-white">Data Lingkup Pengujian</h3>
              <p class="text-white mb-0 mt-1">Daftar lingkup pengujian examination</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
<?php require_once('../../layouts/admin/footer.php') ?>
<?php
$link = $_SERVER['PHP_SELF'];
$link_array = explode('/', $link);
?>
<aside class="col-1">
  <ul>
    <!-- ADMIN -->
    <?php if ($_SESSION['user']->role == '1') : ?>
      <li class="<?= in_array("dashboard", $link_array) ? 'active' : ''  ?>">
        <a href="../../admin/dashboard">
          <i class="fa-solid fa-2x fa-bars-progress"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="<?= in_array("companies", $link_array) ? 'active' : ''  ?>">
        <a href="../../admin/companies">
          <i class="fa-solid fa-2x fa-building-flag"></i>
          <span>Company</span>
        </a>
      </li>
      <li class="<?= in_array("auditors", $link_array) ? 'active' : ''  ?>">
        <a href="../../admin/auditors">
          <i class="fa-solid fa-2x fa-user-tie"></i>
          <span>Auditor</span>
        </a>
      </li>
      <li class="<?= in_array("examinations", $link_array) ? 'active' : ''  ?>">
        <a href="../../admin/examinations">
          <i class="fa-solid fa-2x fa-people-group"></i>
          <span>Examination</span>
        </a>
      </li>
      <li class="<?= in_array("master", $link_array) ? 'active' : ''  ?>">
        <a href="../../admin/master">
          <i class="fa-solid fa-2x fa-database"></i>
          <span>Master</span>
        </a>
      </li>
    <?php elseif ($_SESSION['user']->role == '2') : ?>
      <!-- AUDITOR -->
      <li class="<?= in_array("dashboard", $link_array) ? 'active' : ''  ?>">
        <a href="../../auditor/dashboard">
          <i class="fa-solid fa-2x fa-bars-progress"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="<?= in_array("profile", $link_array) ? 'active' : ''  ?>">
        <a href="../../auditor/profile">
          <i class="fa-2x fa-solid fa-user-tie"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="<?= in_array("examinations", $link_array) ? 'active' : ''  ?>">
        <a href="../../auditor/examinations">
          <i class="fa-2x fa-solid fa-calendar-check"></i>
          <span>Examination</span>
        </a>
      </li>
    <?php else : ?>
      <!-- COMPANY -->
      <li class="<?= in_array("dashboard", $link_array) ? 'active' : ''  ?>">
        <a href="../../company/dashboard">
          <i class="fa-solid fa-2x fa-bars-progress"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="<?= in_array("profile", $link_array) ? 'active' : ''  ?>">
        <a href="../../company/profile">
        <i class="fa-solid fa-2x fa-building-user"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="<?= in_array("examinations", $link_array) ? 'active' : ''  ?>">
        <a href="../../company/examinations">
        <i class="fa-solid fa-2x fa-folder-open"></i>
          <span>Examination</span>
        </a>
      </li>
    <?php endif ?>
  </ul>
</aside>
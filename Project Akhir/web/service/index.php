<?php

session_start();
session_destroy();
include_once('../../core/functions.php');

$standards = all("standards");
?>

<?php require_once('../../layouts/web/header.php') ?>

<!-- Products Start -->
<main class="container-fluid">
    <h1 class="heading">Layanan - Sertifikasi ISO</h1>
    <p>Di bawah program ini, sistem manajemen perusahaan diaudit untuk menentukan apakah mereka diatur dan dikelola sesuai dengan ISO dan standar internasional lainnya, dan disertifikasi jika disetujui.</p>

    <?php foreach ($standards as $standard) : ?>
        <section style="margin-top: 5rem;">
            <h2 class="sub-heading"><?= $standard->name ?> <b>(<?= $standard->code ?>)</b></h2>
            <hr class="mb-4">
            <div class="bg-gray p-4">
                <p><?= $standard->desc ?></p>
            </div>
        </section>
    <?php endforeach; ?>
</main>

<?php require_once('../../layouts/web/footer.php') ?>
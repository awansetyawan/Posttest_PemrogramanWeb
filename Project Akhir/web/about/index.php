<?php

session_start();
session_destroy();
include_once('../../core/functions.php');

if (isset($_GET['search']) && $_GET['search'] != '') {
    $search = htmlspecialchars($_GET['search']);
    $examinations = examination_list("WHERE companies.name LIKE '%$search%'");
} else {
    $examinations = [];
}
?>

<?php require_once('../../layouts/web/header.php') ?>

<!-- Products Start -->
<main class="container-fluid">
    <h1 class="heading">Tentang</h1>
    <section style="margin-top: 5rem;">
        <img src="../../assets/img/logo_horizontal.png" alt="" style="height: 100px;">
        <hr class="mb-4">
        <div class="bg-gray p-4">
            <p>Ekonomi dan masyarakat Indonesia telah memasuki era perubahan struktural dalam beberapa tahun terakhir, membuat respons terhadap deregulasi dan harmonisasi internasional menjadi isu penting dalam berbagai skema regulasi.</p>
            <p>Pengalaman dan pelajaran dari berbagai macam gempa telah mendorong publik Indonesia untuk menegaskan kembali pentingnya mengamankan keselamatan struktural. Dalam administrasi pemerintahan arsitektur dan konstruksi bangunan, terdapat tuntutan yang kuat untuk memastikan penerapan peraturan terkait konstruksi secara efektif.</p>
            <p>Sejak amandemen UU Standar Bangunan, implementasi ke arah ini terus berlanjut dan mengarah pada pengembangan "ketentuan berbasis kinerja" di bawah UU. Bahan bangunan yang digunakan pada bangunan dan struktur lainnya di Jepang harus sesuai dengan persyaratan kualitas yang ditetapkan berdasarkan Undang-Undang Standar Bangunan, terlepas dari apakah produk tersebut berasal dari dalam negeri atau luar negeri.</p>
            <p>Kesesuaian dengan kriteria ini atau dengan persyaratan persetujuan harus ditentukan dengan pengujian dan evaluasi berdasarkan peraturan dan standar kualitas yang relevan.</p>
            <p>Indonesia Testing center for Construction Materials (ITCCM) adalah organisasi pihak ketiga yang telah beroperasi selama lebih dari 10 tahun di INdonesia, yang mengkhususkan diri dalam pengujian kinerja kualitas, persetujuan Menteri, dan persetujuan bahan bangunan sebagai ditentukan berdasarkan ketentuan Undang-undang Standar Bangunan tersebut di atas.</p>
        </div>
    </section>
</main>

<?php require_once('../../layouts/web/footer.php') ?>
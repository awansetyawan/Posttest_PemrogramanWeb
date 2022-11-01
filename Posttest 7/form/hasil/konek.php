<?php

    // Koneksi ke database
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "pesan_gitar";

    $db = mysqli_connect($server, $username, $password, $db_name);

    if (!$db){
        die("Gagal terhubung".mysqli_connect_error());
    }

?>
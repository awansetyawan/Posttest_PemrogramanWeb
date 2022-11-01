<?php

    session_start();
    if(!isset($_SESSION['login'])){
        echo "<script>
             alert('Akses ditolak, silahkan login dulu');
             document.location.href = 'login/masuk.php';
             </script>";
    }else{
        $username = $_SESSION['login'];
    }
?>

<!DOCTYPE html>
<html lang="en" id="bg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 2109106002_Alif Maulana Setyawan</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header class="baris">
        <img id="logo" class="kolom kolom-2" src="image/Logo.png">
        <h1 class="judul kolom kolom-10">Galeri Gitar</h1>
    </header>

    <nav>
        <ul>
            <div class="baris">
                <div class="kolom-10">
                    <li><a class="tanda" href="index.php">Home</a></li>
                    <li><a href="aboutme.php">About Me</a></li>
                    <li><a href="form/beli.php">Pesan</a></li>
                    <li><a href="data_pesan/data.php">Keranjang</a></li>
                    <li><a href="login/keluar.php">Logout</a></li>
                </div>
                <div class="kolom-2">
                    <li>
                        <div class="switch">
                            <input type="checkbox" id="checkbox" class="switch-dark">
                            <label for="checkbox"></label>
                        </div>
                    </li>
                </div>
            </div>
        </ul>
    </nav>


    <main id="dark">

        <div id="guitar-list">
            <div class="baris">
                <div class="kolom kolom-6 baris guitar-item">
                    <div class="kolom kolom-3">
                        <img src="image/gitar3.png" alt="" class="guitar-img">
                    </div>
                    <div class="kolom kolom-9 flex align-items-center">
                        <p class="guitar-name">Gitar Alhambra Classical Flamenco</p>
                    </div>
                </div>
                <div class="kolom kolom-6 baris guitar-item">
                    <div class="kolom kolom-3">
                        <img src="image/gitar2.png" alt="" class="guitar-img">
                    </div>
                    <div class="kolom kolom-9 flex align-items-center">
                        <p class="guitar-name">Gitar Chitarra acustica a corde d'acciaio Cutaway Dreadnought</p>
                    </div>
                </div>
            </div>
            <hr align="center" width="99%" size="4" color="black" noshade>
            <div class="baris">
                <div class="kolom kolom-6 baris guitar-item">
                    <div class="kolom kolom-3">
                        <img src="image/gitar1.png" alt="" class="guitar-img">
                    </div>
                    <div class="kolom kolom-9 flex align-items-center">
                        <p class="guitar-name">Gitar akustik listrik C. F. Martin & Company Dreadnought</p>
                    </div>
                </div>
                <div class="kolom kolom-6 baris guitar-item">
                    <div class="kolom kolom-3">
                        <img src="image/gitar4.png" alt="" class="guitar-img">
                    </div>
                    <div class="kolom kolom-9 flex align-items-center">
                        <p class="guitar-name">Gitar Giannini Classical Cutaway Acoustic Cavaquinho</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="baris">
        <div class="kolom">
            <p class="info"><a href="https://github.com/awansetyawan" target="_blank">Github :
                    github.com/awansetyawan</a></p>
        </div>
        <div class="kolom">
            <p class="copyright">Copyright @ 2022</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="javascript/index.js"></script>

</body>

</html>
<?php

    session_start();
    if(!isset($_SESSION['login'])){
        echo "<script>
            alert('Akses ditolak, silahkan login dulu');
            document.location.href = '../login/masuk.php';
            </script>";
    }else{
        $username = $_SESSION['login'];
        
        require '../form/hasil/konek.php';

        if(isset($_GET['search'])){
            $keyword = $_GET['keyword'];
            $result = mysqli_query($db, "SELECT * FROM pesanan WHERE nama LIKE '%$keyword%' OR gitar LIKE '%$keyword%'");
        }else{
            $result = mysqli_query($db, "SELECT * FROM pesanan");
        }
    }
?>

<!DOCTYPE html>
<html lang="en" id="bg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2109106002_Alif Maulana Setyawan</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="data.css">

</head>

<body>
    <header class="baris">
        <img id="logo" class="kolom kolom-2" src="../image/Logo.png">
        <h1 class="judul kolom kolom-10">Galeri Gitar</h1>
    </header>

    <nav>
        <ul>
            <div class="baris">
                <div class="kolom-10">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../aboutme.php">About Me</a></li>
                    <li><a href="../form/beli.php">Pesan</a></li>
                    <li><a class="tanda" href="data.php">Keranjang</a></li>
                    <li><a href="../login/keluar.php">Logout</a></li>
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
        <div class="konten">
            <h2 class="pesan">Keranjang Pesanan</h2>
            <hr align="center" width="95%" size="4" color="#333">

            <div class="box">
                <form action="" method="GET"> 
                    <input type="text" name="keyword" id="keyword" class="keyword">
                    <button type="submit" name="search">Cari</button>
                </form>
            </div>

            <div class="posisi">
                <div class="efek">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gitar</th>
                            <th>Jumlah</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>WhatsApp</th>
                            <th>Waktu Transfer</th>
                            <th>Bukti Transfer</th>
                            <th colspan='2'></th>
                        </tr>
            
                        <?php 
                            $i = 1;
                            while($row = mysqli_fetch_array($result)){
                        ?>

                        <tr>
                            <td> <?=$i; ?> </td>
                            <td> <?=$row['nama']?> </td>
                            <td> <?=$row['gitar']?> </td>
                            <td> <?=$row['jumlah']?> </td>
                            <td> <?=$row['alamat']?> </td>
                            <td> <?=$row['email']?> </td>
                            <td> <?=$row['whatsapp']?> </td>
                            <td> <?=$row['waktu']?> </td>
                            <td> <img src="../pembayaran/<?=$row['bukti']?>" alt="" width="160px"> </td>
                            <td><a href="../form/hasil/crud/edit.php?id=<?=$row['id']?>">edit</a></td>
                            <td><a href="../form/hasil/crud/hapus.php?id=<?=$row['id']?>">hapus</a></td>
                        </tr>
                        
                        <?php
                            $i++;
                            }
                        ?>
            
                    </table>
                </div>
                <br>
                <div class="peringatan">
                    Peringatan : <br>
                    Jika telah memesan dan dibayar maka perubahan atau penghapusan akan diabaikan. <br>
                    Oleh karena itu, sebelum melakukan pembayaran cek kembali pesanan anda !!!
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
    <script src="mode.js"></script>

</body>

</html>
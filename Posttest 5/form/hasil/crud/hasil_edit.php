<?php
    require '../konek.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    if(isset($_POST['submit'])){
        
        $nama = $_POST['nama'];
        $gitar = $_POST['namagitar'];
        $jumlah = $_POST['jumlah'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $wa = $_POST['wa'];

        $result = mysqli_query($db, 
        "UPDATE pesanan SET
        nama='$nama',
        gitar='$gitar',
        jumlah='$jumlah',
        alamat='$alamat',
        email='$email',
        whatsapp='$wa' WHERE id='$id'");
    }
?>

<!DOCTYPE html>
<html lang="en" id="bg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 2109106002_Alif Maulana Setyawan</title>

    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../tampil.css">

</head>

<body>
    <header class="baris">
        <img id="logo" class="kolom kolom-2" src="../../../image/Logo.png">
        <h1 class="judul kolom kolom-10">Galeri Gitar</h1>
    </header>

    <nav>
        <ul>
            <div class="baris">
                <div class="kolom-11">
                    <li><a href="../../../index.php">Home</a></li>
                    <li><a href="../../../aboutme.php">About Me</a></li>
                    <li><a class="tanda" href="../../beli.php">Pesan</a></li>
                    <li><a href="../../../data_pesan/data.php">Keranjang</a></li>
                </div>
                <div class="kolom-1">
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
        <h2 class="terima">-TERIMAKASIH-<br>
            PESANAN MU BERHASIL DIUPDATE
        </h2>
        <hr align="center" width="95%" size="4" color="#333">
        <div class="hasil">
            <div class="atas">
                <?php
                    if(isset($_POST['submit'])){
                        $nama = $_POST['nama'];
                    }
                    echo "Hai $nama     ";
                    echo "Terimakasih telah memesan <3";
                ?>
            </div>

            <div class="tengah">
                <?php
                    if(isset($_POST['submit'])){
                        $gitar = $_POST['namagitar'];
                        $jumlah = $_POST['jumlah'];
                        $alamat = $_POST['alamat'];
                        $wa = $_POST['wa'];
                        $email = $_POST['email'];
                    }
                    echo "<br> Data Pesanan mu :";
                    echo "<br>";
                    

                    echo "<pre> Gitar    : $gitar";
                    echo "<br> Jumlah   : $jumlah";
                    echo "<br> Alamat   : $alamat";
                    echo "<br> Whatsapp : $wa";
                    echo "<br> Email    : $email";

                ?>
            </div>
            <div class="bawah">
                *Lakukan pembayaran melalui pesan yang dikirim melalui email
            </div>
            <br>
            <a href="../../../data_pesan/data.php"><button>Lihat Keranjang</button></a>
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
    <script src="../tampil.js"></script>


</body>

</html>
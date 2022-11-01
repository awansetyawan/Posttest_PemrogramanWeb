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
    }

    if(isset($_POST['transfer'])) {
        $gambar = $_FILES['bukti']['name'];
        $nama = $_POST['nama'];
        $gitar = $_POST['namagitar'];
        $jumlah = $_POST['jumlah'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $wa = $_POST['wa'];
        $waktu = $_POST['waktu'];
        if($_FILES['bukti']['name'] != '') {

            $result = mysqli_query($db, "SELECT * FROM pesanan WHERE id='$id'");
            $row = mysqli_fetch_array($result);
            unlink("../../../pembayaran/{$row['bukti']}");  

            $x = explode('.',$gambar);
            $ekstensi = strtolower(end($x));
            $gambar_baru = "$nama.$ekstensi";
    
            $tmp = $_FILES['bukti']['tmp_name'];
            
            if(move_uploaded_file($tmp, "../../../pembayaran/$gambar_baru")){
            
                $result = mysqli_query($db, 
                    "UPDATE pesanan SET
                    nama='$nama',
                    gitar='$gitar',
                    jumlah='$jumlah',
                    alamat='$alamat',
                    email='$email',
                    bukti='$gambar_baru',
                    whatsapp='$wa' WHERE id='$id'");
            }
            
        }else{
            $result = mysqli_query($db, 
                "UPDATE pesanan SET
                nama='$nama',
                gitar='$gitar',
                jumlah='$jumlah',
                alamat='$alamat',
                email='$email',
                whatsapp='$wa' WHERE id='$id'");
        }

        if($result){
            echo "berhasil kirim";   
            header("Location:../../../data_pesan/data.php");
        }else{
            echo "gagal kirim";
        }
        
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
                <div class="kolom-10">
                    <li><a href="../../../index.php">Home</a></li>
                    <li><a href="../../../aboutme.php">About Me</a></li>
                    <li><a href="../../beli.php">Pesan</a></li>
                    <li><a class="tanda" href="../../../data_pesan/data.php">Keranjang</a></li>
                    <li><a href="../../../login/keluar.php">Logout</a></li>
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
                Lakukan pembayaran melalui pesan yang dikirim melalui email lalu kirim bukti transfer dibawah ini : <br>
                (Upload ulang bukti transfer, jika pembelian yang dirubah maka lakukan transfer ulang dan upload lagi) <br>
                - Jika total pembelian harganya lebih besar dari pembelian pertama maka transfer sisanya. <br>
                - Jika total pembelian harganya kurang dari pembelian pertama maka dana akan dikembalikan sisanya.
            </div>
            <br>
            <form action=""  method="POST" enctype="multipart/form-data">
                <input type="hidden" name="nama" value="<?= $nama ?>">
                <input type="hidden" name="namagitar" value="<?= $gitar ?>">
                <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
                <input type="hidden" name="alamat" value="<?= $alamat ?>">
                <input type="hidden" name="email" value="<?= $email ?>">
                <input type="hidden" name="wa" value="<?= $wa ?>">
                <input type="hidden" name="waktu" value="<?= $waktu ?>">
                <label for="bukti" class="bukti">Bukti Transfer</label>
                <input type="file" id="bukti" name="bukti"> <br><br>

                <input type="submit" name="transfer">
            </form>
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
<?php
    require '../konek.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $result = mysqli_query($db,
    "SELECT * FROM pesanan WHERE id='$id'");
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en" id="bg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 2109106002_Alif Maulana Setyawan</title>

    <link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="../../beli.css">

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

        <h2 class="isi">Edit Pembelian</h2>
        <hr align="center" width="95%" size="4" color="#333">
        <div class="datadiri">
            <form action="hasil_edit.php?id=<?=$row['id']?>" method="POST">
                <label for="fullname"> Nama Lengkap </label>
                    <input
                        required
                        placeholder="Nama"
                        id="nama"
                        name="nama"
                        type="text"
                        autocomplete='off'
                        value="<?=$row['nama']?>"
                    />
                <br>
        
                <label for="gitar"> Nama Gitar </label>
                <select name="namagitar"">
                    <option value="pilih" disabled selected>-Pilih Gitar-</option>
                    <option value="Alhambra" <?=$row['gitar'] == 'Alhambra'? 'selected' : ''?>>Alhambra</option>
                    <option value="Chitarra" <?=$row['gitar'] == 'Chitarra'? 'selected' : ''?>>Chitarra</option>
                    <option value="Dreadnought" <?=$row['gitar'] == 'Dreadnought'? 'selected' : ''?>>Dreadnought</option>
                    <option value="Giannini" <?=$row['gitar'] == 'Giannini'? 'selected' : ''?>>Giannini</option>    
                </select>
                <br>
        
                <label for="jumlah"> Jumlah Beli</label>
                    <input
                        placeholder="Jumlah"
                        id="jumlah"
                        name="jumlah"
                        type="number"
                        min="1"
                        value="<?=$row['jumlah']?>"
                    />
                <br>
        
                <label for="alamat"> Alamat Rumah </label>
                    <input
                        required
                        placeholder="Alamat"
                        id="alamat"
                        name="alamat"
                        type="text"
                        autocomplete='off'
                        value="<?=$row['alamat']?>"
                    />
                <br>
        
                <label for="email"> Email </label>
                <input
                    required
                    placeholder="Email"
                    id="email"
                    name="email"
                    type="email"
                    autocomplete='off'
                    value="<?=$row['email']?>"
                />
                <br>
        
                <label for="wa"> No WhatsApp </label>
                <input
                    required
                    placeholder="WhatsApp"
                    id="wa"
                    name="wa"
                    type="text"
                    autocomplete='off'
                    value="<?=$row['whatsapp']?>"
                />
                <br>
                <input type="submit" name="submit" value="UPDATE">
            </form>
            <a href="../../../data_pesan/data.php">
                <input type="submit" name="cancel" value="CANCEL"/>
            </a>
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
    <script src="../../mode.js"></script>

</body>

</html>
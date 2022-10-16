<!DOCTYPE html>
<html lang="en" id="bg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 2109106002_Alif Maulana Setyawan</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="beli.css">

</head>

<body>
    <header class="baris">
        <img id="logo" class="kolom kolom-2" src="../image/Logo.png">
        <h1 class="judul kolom kolom-10">Galeri Gitar</h1>
    </header>

    <nav>
        <ul>
            <div class="baris">
                <div class="kolom-11">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../aboutme.php">About Me</a></li>
                    <li><a class="tanda" href="beli.php">Pesan</a></li>
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

        <h2 class="isi">Form Pembelian</h2>
        <hr align="center" width="95%" size="4" color="#333">
        <div class="datadiri">
            <form action="hasil/tampil.php" method="POST">
                <label for="fullname"> Full Name </label>
                    <input
                        required
                        placeholder="Input Name"
                        id="nama"
                        name="nama"
                        type="text"
                        autocomplete='off'
                    />
                <br>
        
                <label for="gitar"> Nama Gitar </label>
                <select name="namagitar">
                    <option value="pilih">-Pilih Gitar-</option>
                    <option value="Alhambra">Alhambra</option>
                    <option value="Chitarra">Chitarra</option>
                    <option value="Dreadnought">Dreadnought</option>
                    <option value="Giannini">Giannini</option>
                </select>
                <br>
        
                <label for="jumlah"> Jumlah Beli</label>
                    <input
                        placeholder="Jumlah"
                        id="jumlah"
                        name="jumlah"
                        type="number"
                        min="1"
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
                />
                <br>
                <input type="submit" name="submit" value="PESAN">
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
    <script src="mode.js"></script>

</body>

</html>
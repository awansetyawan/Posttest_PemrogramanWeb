<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/daftar.css">
    <title>Daftar</title>
</head>
<body>
    <div class="kotak">
        <div class="form_daftar">
            <form action="" method="post">
                <h3>Daftar</h3>
                <hr align="center" width="100%" size="4" color="#333">
                
                <label for="email">Email</label><br>
                <input type="email" name="email" class="input" placeholder="Masukkan email"><br>

                <label for="username">Username</label><br>
                <input type="text" name="username" class="input" placeholder="Masukkan username"><br>

                <label for="password">Password</label><br>
                <input type="password" name="password" class="input" placeholder="Password"><br>

                <label for="konfirmasi">Konfirmasi Password</label><br>
                <input type="password" name="konfirmasi" class="input" placeholder="Konfirmasi password"><br>

                <input type="submit" name="daftar" class="submit" value="Daftar"><br><br>
            </form>

            <p>Sudah punya akun?
                <a href="masuk.php">Login</a>
            </p>
        </div>
    </div>
</body>
</html>

<?php

    require '../form/hasil/konek.php';

    if(isset($_POST['daftar'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        $sql = "SELECT * FROM akun WHERE username = '$username'";
        $user = $db->query($sql);

        if(mysqli_num_rows($user) > 0){
            echo "<script>
                    alert('Username telah digunakan, silahkan gunakan username lain');
                 </script>";
        }else{
            
            if($password == $konfirmasi){
                

                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO akun (email, username, psw)
                            VALUES ('$email', '$username', '$password')";
                
                $result = $db->query($query);

                if($result){
                    echo "<script>
                         alert('Daftar Akun Berhasil');
                         </script>";
                }else{
                    echo "<script>
                         alert('Daftar Akun Gagal');
                         </script>";
                }
            }else{
                echo "<script>
                     alert('Konfirmasi Password Salah !!!');
                     </script>";
            }
        }
    }

?>
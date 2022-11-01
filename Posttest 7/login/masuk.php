<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/masuk.css">
    <title>Masuk</title>
</head>
<body>
    <div class="kotak">
        <div class="form_login">
            <h3>Login</h3>
            <hr align="center" width="100%" size="4" color="#333">
            <form action="" method="post">
                <input type="text" name="user" placeholder="email atau username" class="input">
                <input type="password" name="password" placeholder="password" class="input">

                <input type="submit" name="login" value="Login" class="submit"><br><br>
            </form>

            <p>Belum punya akun?
                <a href="daftar.php">Daftar</a>
            </p>
        </div>
    </div>
</body>
</html>

<?php

    session_start();

    require '../form/hasil/konek.php';

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM akun WHERE username='$user' OR email='$user'";
        $result = $db->query($sql);
        
        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);
            $username = $row['username'];

            if(password_verify($password, $row['psw'])){

                $_SESSION['login'] = $username;

                echo "<script>
                      alert('Selamat Datang $username');
                      document.location.href = '../index.php';
                      </script>";
            }else{
                echo "<script>
                      alert('Password Salah!');
                      </script>";
            }   

        }else{
            echo "<script>
                  alert('Username tidak terdaftar, silahkan registrasi dahulu');
                  </script>";
        }
    }

?>
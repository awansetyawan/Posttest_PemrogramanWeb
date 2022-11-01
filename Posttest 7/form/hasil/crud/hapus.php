<?php

require '../konek.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $result = mysqli_query($db,
    "SELECT * FROM pesanan WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    $result = mysqli_query($db, "DELETE FROM pesanan WHERE id='$id'");
    
    unlink("../../../pembayaran/{$row['bukti']}");
    echo 'Deleted';
    if($result){
        header("Location:../../../data_pesan/data.php");
    }
}

?>
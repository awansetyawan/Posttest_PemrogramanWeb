<?php

require '../konek.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $result = mysqli_query($db,
        "DELETE FROM pesanan WHERE id='$id'");

    if($result){
        header("Location:../../../data_pesan/data.php");
    }
}

?>
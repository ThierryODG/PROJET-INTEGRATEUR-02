<?php
include 'connecte.php';
if(isset($_GET['supprimeid'])){
    $id=$_GET['supprimeid'];

    $sql="delete from agent_reception where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo"suppression reussie";
        header('location:accueilAdmin.php');
    }else{
        die(mysqli_error($con));
    }

}

?>
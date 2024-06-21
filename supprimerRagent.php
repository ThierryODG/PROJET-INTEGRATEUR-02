<?php
include 'connecte.php';
if(isset($_GET['supprimeid'])){
    $id=$_GET['supprimeid'];

    $sql="delete from reservation where id=$id";
    $requete="delete from client where id=$id";
    $result=mysqli_query($con,$sql);
    $resultat=mysqli_query($con,$requete);
    if($result && $resultat){
        //echo"suppression reussie";
        header('location:accueilAgent.php');
    }else{
        die(mysqli_error($con));
    }

}

?>
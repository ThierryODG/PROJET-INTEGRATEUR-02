<?php
    include("./methode/db_methode.php"); 
    //session_start();
    if (isset($_POST['submit'])){
        $nb_personne = $_POST['nb_personne'];
        $date_arrive = $_POST['date_arrive'];
        $date_depart = $_POST['date_depart'];

        $id_client=$_GET['cid'];
        $id_hotel=$_GET['h_id'];
    
        db_methode::add_reservation($id_client,$id_hotel,$date_arrive,$date_depart,1,$nb_personne);
        db_methode::genererfacturepdf($id_client,$id_hotel);
    }
?>
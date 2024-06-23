<?php 
    if (isset($_POST['submit'])) {
        $id_client = $_POST['id_client'];
        $id_hotel = $_POST['id_hotel'];
        $nb_personne = $_POST['nb_personne'];
        $date_arrive = $_POST['date_arrive'];
        $date_depart = $_POST['date_depart'];
        $type = $_POST['type'];
        $options = $_POST['options'];
        $demande = $_POST['demande'];
        $information = $_POST['information'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $genre = $_POST['genre'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cnib = $_POST['cnib'];

        include("./methode/db_methode.php");
        db_methode::add_reservation($id_client, $id_hotel,$date_arrive, $date_depart, 0, $nb_personne);
        db_methode::genererfacturepdf($id_client,$id_hotel,$type,$nb_personne,$options);
    }

?>
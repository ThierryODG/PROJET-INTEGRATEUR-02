<?php
require 'vendor/autoload.php'; // Assurez-vous que le chemin vers l'autoloader de Composer est correct

include("./methode/db_methode.php");

use Dompdf\Dompdf;
use Dompdf\Options;

if (isset($_POST['submit'])) {
    $nb_personne = $_POST['nb_personne'];
    $date_arrive = $_POST['date_arrive'];
    $date_depart = $_POST['date_depart'];
    $type = $_POST['type'];
    $nb_perso = $_POST['nb_personne'];
    $option = $_POST['options'];

    $id_client = $_GET['cid'];
    $id_hotel = $_GET['h_id'];

    // Ajout de la réservation
    //db_methode::add_reservation($id_client, $id_hotel, $date_arrive, $date_depart, false, $nb_personne);

    // Génération du PDF
    try {
        db_methode::genererFacturePdf($id_client, $id_hotel, $type, $nb_perso);
    } catch (Exception $e) {
        echo "Erreur lors de la génération du PDF : " . $e->getMessage();
    }
}

?>
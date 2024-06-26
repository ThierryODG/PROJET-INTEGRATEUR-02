<?php 
    if (isset($_POST['submit'])) {
        $id_client = intval($_POST['id_client']);
        $id_hotel = intval($_POST['id_hotel']);
        $nb_personne = intval($_POST['nb_personne']);
        $date_arrive = $_POST['date_arrive'];
        $date_depart = $_POST['date_depart'];
        $type = $_POST['type'];

        include("./methode/db_methode.php");
        try {
            db_methode::genererFacturePdf($id_client,$id_hotel,$type,$nb_personne);
        } catch (Exception $e) {
            echo "Erreur lors de la génération du PDF : " . $e->getMessage();
        }
        db_methode::add_reservation($id_client, $id_hotel,$date_arrive, $date_depart, 0, $nb_personne);
    }

?>
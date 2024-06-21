<?php
session_start();
require_once './methode/db_methode.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reservation_id'])) {
    $reservationId = $_POST['reservation_id'];

    // Appeler la méthode pour confirmer la réservation
    db_methode::confirmReservation($reservationId);

    // Rediriger vers la page de réservation après confirmation
    header('Location: reservationlist.php');
    exit;
} else {
    // Gérer le cas où la requête n'est pas valide
    header('Location: reservationlist.php');
    exit;
}
?>

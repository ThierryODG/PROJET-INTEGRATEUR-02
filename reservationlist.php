<?php
    session_start();
    require_once './methode/db_methode.php';

    // Vérifiez si l'id du client est dans la session
    if (isset($_SESSION['id'])) {
        $clientId = $_SESSION['id'];
        $reservations = db_methode::getReservationsByClientId($clientId);
        
    } else {
        // Gérer le cas où l'id de session n'est pas défini
        $reservations = [];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Reservations</title>
</head>

<body>
    <?php include("entete1.php"); ?>

    <section>
        <div class="reservations">
        <?php if (!empty($reservations)): ?>
            <?php foreach ($reservations as $reservation): ?>
                <div class="reservationlist">
                    <h2>Reservation ID: <?php echo htmlspecialchars($reservation['id']); ?></h2>
                    <p>Hotel ID: <?php echo htmlspecialchars($reservation['id_hotel']); ?></p>
                    <p>Nom de l'hotel: <?php echo htmlspecialchars(db_methode::gethotelname($reservation['id_hotel'])); ?></p>
                    <p>Date: <?php echo htmlspecialchars($reservation['date_arrive']); ?></p>
                    <div>
                        <form action="reservation_del.php" method="post">
                            <input type="hidden" name="reservation_id" value="<?php echo htmlspecialchars($reservation['id']); ?>">
                            <button type="submit" class="btn2">Annuler</button>
                        </form>
                        <?php if ($reservation['statut_confirmation'] == 0): ?>
                            <form action="confirmer_reservation.php" method="post">
                                <input type="hidden" name="reservation_id" value="<?php echo htmlspecialchars($reservation['id']); ?>">
                                <button type="submit" class="btn2">Confirmer</button>
                            </form>
                        <?php else: ?>
                            <p>Réservation confirmée</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no_reserve">Pas de reservation.</p>
        <?php endif; ?>
        </div>
    </section>

    <?php include("pied_de_page.php"); ?>
</body>
</html>

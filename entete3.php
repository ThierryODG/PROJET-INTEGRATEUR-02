<?php
    session_start();
?>

<header>
    <nav>

        <ul class="navigation">
            <li>
                <h1>Diamond</h1>
            </li>

            <li>
                <a href="accueilAdmin.php">Acceuil</a>
            </li>

            <li>
                <a href="chambreAdmin.php">chambres</a>
            </li>
            <li>
                <a href="hotel.php">Hotels</a>
            </li>

            <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])): ?>
                <li class="conname">
                    <?php echo htmlspecialchars($_SESSION['prenom']) . ' ' . htmlspecialchars($_SESSION['nom']); ?>
                </li>
                <li>
                    <a href="logout.php">Se déconnecter</a>
                </li>
            <?php else: ?>
                <li>
                    <a href="connexion.php">Se connecter</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="burger">
        <div class="lignes"></div>
        <div class="lignes"></div>
        <div class="lignes"></div>
    </div>

</header>

<section class="header-section sous">
    <div>
        <h3>vivez dans le luxe</h3>
        <h1>Decouvrez nos hotels de luxe </h1>

        <?php 
            if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
                $current_page = basename($_SERVER['PHP_SELF']);
            // Si l'utilisateur est connecté
                if ($current_page == 'hotel.php' || $current_page == 'hotel_profile.php') {
                    // Si l'utilisateur est sur la page hotel.php
                    echo '<a href="reservationlist.php.php"><button class="btn2">Voir mes reservations</button></a>';
                } else {
                    // Si l'utilisateur n'est pas sur la page hotel.php
                    echo '<a href="hotel.php"><button class="btn2"> RESERVER UNE CHAMBRE</button></a>';
                }
            } else {
                // Si l'utilisateur n'est pas connecté
                echo '<a href="connexion.php"><button class="btn2"> RESERVER UNE CHAMBRE</button></a>';
            }
        ?>
    </div>
</section>
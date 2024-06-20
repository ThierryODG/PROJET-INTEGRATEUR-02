<?php
    session_start();
?>
<header>
    <!-- entete pour les invités -->

    <nav>

        <ul class="navigation">
            <li>
                <h1>Diamond</h1>
            </li>

            <li>
                <a href="accueilGuest.php">Acceuil</a>
            </li>
            <li>
                <a href="hotel.php">Hotels</a>
            </li>
            <li>
                <a href="contactGuest.php" contact.php>contact</a>
            </li>
            <li>
                <a href="aproposGuest.php">a propos</a>
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
        <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])): ?>
            <a href="hotel.php"><button class="btn2"> RESERVER UNE CHAMBRE</button></a>
        <?php else:?>
            <a href="connexion.php"><button class="btn2"> RESERVER UNE CHAMBRE</button></a>
        <?php endif; ?>
    </div>



</section>
<style>
    nav {
        overflow-y: hidden;
    }
</style>
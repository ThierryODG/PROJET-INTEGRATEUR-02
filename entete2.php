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
                <a href="hotelAdmin.php">Hotels</a>
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
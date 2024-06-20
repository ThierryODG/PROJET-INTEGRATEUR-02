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
                <a href="index.php">Acceuil</a>
            </li>
            <li>
                <a href="hotel.php">Hotels</a>
            </li>
            <li>
                <a href="contact.php" contact.php>contact</a>
            </li>
            <li>
                <a href="apropos.php">a propos</a>
            </li>

            <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])): ?>
                <li class="conname">
                     <?php echo htmlspecialchars($_SESSION['prenom']) . ' ' . htmlspecialchars($_SESSION['nom']); ?>
                </li>
                <li>
                    <a href="logout.php">Se déconnecter</a>
                </li>
            <?php else : ?>
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





    </div>
    <?php
    // $currentPage = basename($_SERVER['PHP_SELF']);
    // if ($currentPage == "index.php") {
    //     echo "<h1>Decouvrez nos hotels de luxe </h1><br><br><a href=\"detailChambre.php\"> <button class=\"btn1\">CONSULTER NOS CHAMBRES</button></a>";
    // } elseif ($currentPage == "hotel.php") {
    //     echo "<h1>Catalogue de nos Hotels.<br> Faites votre choix!! </h1>";
    // } elseif ($currentPage == "inscription.php" || $currentPage == "inscription.php") {
    //     echo "<h1>Veillez vous inscrire ou vous connectez pour effectuer une reservation</h1>";
    // } else {
    //     echo "<h1>Bienvenu!! <br>Decouvrez nos hotels de luxe</h1>";
    // }
    ?>



</section>
<!-- formulaire pour le check in check out (a detaillé)-->
<!-- <div class="formulaire_entete survol">
    <form action="" method="post">

        <label for="date_arrive">Date d'arrivée</label>
        <input type="date" name="date_arrive">

        <label for="">Verifier</label>
        <input type="date" name="date_arrive ">
        <input type="submit" value="Envoyer" class="btn_date">

    </form>
</div> -->
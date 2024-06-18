<?php
include("connecte.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.php</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    include("entete.php");
    ?>


    <h4 class="who"> qui sommes-nous</h4>
    <h1 class="welcome">bienvenu chez <span>Diamond</span> </h1>
    <p class="para1"> où luxe et confort se rencontrent pour une expérience inoubliable. Réservez votre séjour et laissez-nous vous choyer dans l’éclat du luxe.</p>
    <!-- recceuillir dans la bases de donnéé les donnée reelle et les pacé a la palce des nombres mis -->
    <div class="Dashbord">
        <h2> <img src="./img/logo_chambre.png" alt="logo chambre" height="55px"> <?php $requete = "SELECT COUNT(*) AS nombre_chambres FROM chambre";
                                                                                    $resultat = mysqli_query($con, $requete);

                                                                                    if ($resultat) {
                                                                                        $row = mysqli_fetch_assoc($resultat);
                                                                                        $nombre_chambres = $row['nombre_chambres'];
                                                                                        echo "Chambre : $nombre_chambres";
                                                                                    } else {
                                                                                        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
                                                                                    }
                                                                                    ?></h2>
        <h2> <img src="./img/logo_personnel.png" alt="logo personnel" height="55px"> <?php $requete = "SELECT COUNT(*) AS nombre_personnel FROM agent_reception";
                                                                                        $resultat = mysqli_query($con, $requete);

                                                                                        if ($resultat) {
                                                                                            $row = mysqli_fetch_assoc($resultat);
                                                                                            $nombre_personnel = $row['nombre_personnel'];
                                                                                            echo "personnel : $nombre_personnel";
                                                                                        } else {
                                                                                            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
                                                                                        }
                                                                                        ?></h2>
        <h2> <img src="./img/logo_client.png" alt="logo personnel" height="55px"> <?php $requete = "SELECT COUNT(*) AS nombre_client FROM client";
                                                                                    $resultat = mysqli_query($con, $requete);

                                                                                    if ($resultat) {
                                                                                        $row = mysqli_fetch_assoc($resultat);
                                                                                        $nombre_client = $row['nombre_client'];
                                                                                        echo " Clientèle : $nombre_client";
                                                                                    } else {
                                                                                        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
                                                                                    }
                                                                                    ?></h2>

    </div>
    <button class="btn-savoir">contactez-nous
        <a href="contact.php"></a>
    </button>

    <h6 class="our-rooms">nos chambres</h6>
    <h1>explorez nos <span>chambres</span></h1>
    <section class="listeChambre">
        <div class="container">
            <img src="./img/room-1.jpg" alt="">
            <h3> simple</h3>
            <p>Confort essentiel, ambiance cosy, idéale pour voyageurs solitaires.</p>
            <a href="detailChambre.php"> <button class="btn-detail">voir les details</button></a> <a href="reservation.php"> <button class="btn-reserver">reserver maintenant</button></a>
        </div>
        <div class="container">
            <img src="./img/room-2.jpg" alt="">
            <h3> millieu de gamnme</h3>
            <p>Spacieuse, équipements modernes, parfait équilibre <br>qualité-prix pour un sejour agréable</p>
            <a href="detailChambre.php"> <button class="btn-detail">voir les details</button></a> <a href="reservation.php"> <button class="btn-reserver">reserver maintenant</button></a>
        </div>
        </div>
        <div class="container">
            <img src="./img/room-3.jpg" alt="">
            <h3>Deluxe</h3>
            <p> Suite somptueuse, services exclusifs, <br>vue imprenable pour une élégance inégalée.</p>
            <a href="detailChambre.php"> <button class="btn-detail">voir les details</button></a> <a href="reservation.php"> <button class="btn-reserver">reserver maintenant</button></a>
        </div>
        </div>
    </section>
    <section class="gauche-droite">
        <div class="gauche">
            <h6>vivez dans le luxe</h6>
            <h1>decouvrez nos hotels de luxe</h1>
            <p>Découvrez Diamond Hotel : service impeccable, emplacements privilégiés, chambres luxueuses, gastronomie raffinée et installations de pointe pour un séjour mémorable alliant détente et exclusivité.</p>
            <a href="detailChambre.php"><button class="gauche-btn1">nos chambres</button></a> <a href="reservation.php"><button class="gauche-btn2">Réserver une chambre</button></a>
        </div>
        <div class="droite">
            <a href="https://www.youtube.com/embed/DWRcNpR6Kdc"><img src="./img/video1.jpg" alt="" width="1500px" height="500px"></a>

        </div>
    </section>

    <section>
        <h6 class="nos-services">nos serices</h6>
        <h1>Explorez nos <span> services</span></h1>
        <div class="service-container">
            <div class="service">
                <img src="./img/logo-chambre2.png" alt="logoChambre" height="75px">
                <h3>chambres et appartement</h3>
                <p>Confort moderne, intimité garantie, vues imprenables.</p>
            </div>
            <div class="service">
                <img src="./img/logonouriture.png" alt="logoNourriture" height="75px">
                <h3>Nouttiture et restauration</h3>
                <p>Saveurs exquises, ambiance élégante, service exceptionnel..</p>
            </div>
            <div class="service">
                <img src="./img/logospa.png" alt="logoSpa" height="75px">
                <h3>Spa et remise en forme</h3>
                <p>Détente ultime, soins de luxe, bien-être assuré.</p>
            </div>
            <div class="service">
                <img src="./img/logosport.png" alt="logosport" height="75px">
                <h3>Sport et jeux</h3>
                <p> Loisirs dynamiques, équipements variés, plaisir familial.</p>
            </div>
            <div class="service">
                <img src="./img/logoEvent.png" alt="logoEvent" height="75px">
                <h3>Evenement et fête</h3>
                <p>Célébrations grandioses, cadres somptueux, organisation parfaite</p>
            </div>
            <div class="service">
                <img src="./img/logoGym.png" alt="logoGym" height="75px">
                <h3>Gym & Yoga</h3>
                <p> Installations modernes, cours diversifiés, santé optimisée.</p>
            </div>
        </div>
    </section>

    <section class="commentaire">
        <div class="commentaire1">
            <img src="./img/coment1.jpg" alt="">
            <p>Tout simplement fabuleux ! ma famille et moi y avons passer nos vaccances d'été, et c'était les meilleurs de ma vie !</p>
            <br>
            <h4>Ouedraogo soubeiga</h4>
        </div>

        <div class="commentaire1">
            <img src="./img/comment2.jpg" alt="">
            <p>La piscine de cet hotel est tout simplement wow ! , en tant que grande sportive elle etait vraiment au conditions internationale !</p>
            <br>
            <h4>palinfo salimata 2eme jumelle</h4>
        </div>
    </section>
    <h3>notre personnel</h3>
    <h1> <span class="nos-emp"> nos employé </span> du mois</h1>
    <section class="employ">
        <div class="emp">
            <img src="./img/employe1.jpg" alt="" height="400" width="400">
            <h3>Nadine Ouedraogo</h3>
            <h4>receptionniste</h4>
        </div>
        <div class="emp">
            <img src="./img/employe2.jpg" alt="" height="400" width="400">
            <h3>sombda Ouamrou</h3>
            <h4>préposé chambre</h4>
        </div>
        <div class="emp">
            <img src="./img/employe3.jpg" alt="" height="400" width="400">
            <h3>Ki Golbert </h3>
            <h4>Sommelier</h4>
        </div>
        <div class="emp">
            <img src="./img/employe4.jpg" alt="" height="400" width="400">
            <h3>willson sanson </h3>
            <h4>Maitre d'hotel</h4>
        </div>
    </section>
    <?php
    include('pied_de_page.php');
    ?>






    <script src="app.js"></script>
</body>

</html>
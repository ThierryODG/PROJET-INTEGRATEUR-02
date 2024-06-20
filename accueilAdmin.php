<?php
include("connecte.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>index.php</title>

</head>

<body>
    <?php
    include("entete2.php");
    ?>


    <br>
    <h1 class="welcome">bienvenu chez <span>Diamond</span> Admin </h1>
    <p class="para1">cette page est réservée aux administrateurs </p>
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

    <?php
    include('displayAd.php');

    ?>
    <?php
    include('displayh.php');

    ?>
    <br><br>
    <a href="inscription2.php" class="lienAD"> enregistrer Client</a> <a href="ajouthotel.php"> ajouter Hotel</a>

    <style>
        .lienAD {
            margin-left: 40%;
            margin-right: 5%;
        }
    </style>
    <?php
    include('pied_de_page.php');
    ?>






    <script src="app.js"></script>
</body>

</html>
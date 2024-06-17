<?php
include("connecte.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    include("entete.php");
    ?>

    <h1> nos differents hotels</h1>
    <section>
        <di>
         <br>
        <?php
         $requete = "SELECT UPPER(nom) AS nom_hotel FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_hotel = $row['nom_hotel'];
            echo "Nom Hotel: $nom_hotel";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
         
         <?php
         $requete = "SELECT description FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $description = $row['description'];
            echo  $description;
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
        <?php
         $requete = "SELECT UPPER(adresse) AS nom_adresse FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_adresse = $row['nom_adresse'];
            echo "Nom adresse: $nom_adresse";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
        <?php
         $requete = "SELECT UPPER(email) AS nom_email FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_email = $row['nom_email'];
            echo "Email: $nom_email";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
         <?php
         $requete = "SELECT emplacement AS nom_emplacement FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_emplacement = $row['nom_emplacement'];
            echo "Emplacement_ville: $nom_emplacement";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
        <?php
         $requete = "SELECT categorie AS nom_categorie FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_categorie = $row['nom_categorie'];
            echo "Categorie_ville: $nom_categorie";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
        <?php
         $requete = "SELECT site AS nom_site FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_site = $row['nom_site'];
            echo "Site: $nom_site";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
            <?php
         $requete = "SELECT categorie AS nom_categorie FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_categorie = $row['nom_categorie'];
            echo "Categorie_ville: $nom_categorie";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
            </p>
        </div>

        <div>
        <?php
         $requete = "SELECT UPPER(nom) AS nom_hotel FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_hotel = $row['nom_hotel'];
            echo "Nom Hotel: $nom_hotel";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
            <img src="" alt=""> <!-- placer ici l'image de l'hotel qui sera dans la base de donnée -->
            <>
            <?php
         $requete = "SELECT description FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $description = $row['description'];
            echo  $description;
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
        <?php
         $requete = "SELECT UPPER(adresse) AS nom_adresse FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_adresse = $row['nom_adresse'];
            echo "Nom adresse: $nom_adresse";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
         <?php
         $requete = "SELECT UPPER(email) AS nom_email FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_email = $row['nom_email'];
            echo "Email: $nom_email";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
        <?php
         $requete = "SELECT categorie AS nom_categorie FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_categorie = $row['nom_categorie'];
            echo "Categorie_ville: $nom_categorie";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
        <?php
         $requete = "SELECT site AS nom_site FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_site = $row['nom_site'];
            echo "Site: $nom_site";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
            </p>
        </div>
        <div>
        <?php
         $requete = "SELECT UPPER(nom) AS nom_hotel FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_hotel = $row['nom_hotel'];
            echo "Nom Hotel: $nom_hotel";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
            <img src="" alt=""> <!-- placer ici l'image de l'hotel qui sera dans la base de donnée -->
            <p>
            <?php
         $requete = "SELECT description FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $description = $row['description'];
            echo  $description;
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
        <?php
         $requete = "SELECT UPPER(adresse) AS nom_adresse FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_adresse = $row['nom_adresse'];
            echo "Nom adresse: $nom_adresse";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
        <?php
         $requete = "SELECT UPPER(email) AS nom_email FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_email = $row['nom_email'];
            echo "Email: $nom_email";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
         <?php
         $requete = "SELECT emplacement AS nom_emplacement FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_emplacement = $row['nom_emplacement'];
            echo "Emplacement_ville: $nom_emplacement";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
         <?php
         $requete = "SELECT categorie AS nom_categorie FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_categorie = $row['nom_categorie'];
            echo "Categorie_ville: $nom_categorie";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
        <?php
         $requete = "SELECT site AS nom_site FROM hotel";
        $resultat = mysqli_query($con, $requete);
        if ($resultat) {
            $row = mysqli_fetch_assoc($resultat);
            $nom_site = $row['nom_site'];
            echo "Site: $nom_site";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($con);
        }
        ?></br>
            </p>
        </div>
    </section>

    <?php
    include("pied_de_page.php");
    ?>

</body>

</html>
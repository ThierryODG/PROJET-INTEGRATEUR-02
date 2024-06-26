<?php
include 'connecte.php';
if (isset($_POST['submit'])) {
    $id_client = $_POST['id_client'];
    $id_hotel = $_POST['id_hotel'];
    $nb_personne = $_POST['nb_personne'];
    $date_arrive = $_POST['date_arrive'];
    $date_depart = $_POST['date_depart'];
    $type = $_POST['type'];
    $options = $_POST['options'];
    $demande = $_POST['demande'];
    $information = $_POST['information'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $genre = $_POST['genre'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cnib = $_POST['cnib'];

    include("./methode/db_methode.php");
    db_methode::add_reservation($id_client, $id_hotel,$date_arrive, $date_depart, 0, $nb_personne);
    db_methode::genererfacturepdf($id_client,$id_hotel,$type,$nb_personne,$options);

    /*
    $sql = "insert into reservation (nb_personne,date_arrive,date_depart,type,options,demande,information) 
    values('$nb_personne','$date_arrive','$date_depart','$type','$options','$demande','$information')";

    $requete = "insert into client (nom,prenom,genre,telephone,email,password,cnib) 
    values('$nom','$prenom','$genre','$telephone','$email','$password','$cnib') ";
    $result = mysqli_query($con, $sql);
    $resultat = mysqli_query($con, $requete);

    if ($result && $resultat) {
        //echo " Donnees inserees avec succes";
        header('location:accueilAgent.php');
    } else {
        die(mysqli_error($con));
    }
    */
}


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
    include("entete2.php");
    ?>

    <h1>Réservation de Chambre</h1>
    <form action="process_reservation.php" method="post" class="form">

        <label for="nb_personnes">Identifiant du client:</label>
        <input type="number" id="id" name="id_client" required><br><br>

        <label for="nb_personnes">Identifiant du Hotel:</label>
        <input type="number" id="id" name="id_hotel" required><br><br>

        <label for="nb_personnes">Nombre de personnes:</label>
        <input type="number" id="nb_personnes" name="nb_personne" required><br><br>

        <label for="date_arrive">Date d'arrivée:</label>
        <input type="date" id="date_arrive" name="date_arrive" required><br><br>

        <label for="date_depart">Date de départ:</label>
        <input type="date" id="date_depart" name="date_depart" required><br><br>

        <label for="type">Type de chambre:</label>
        <select id="type" name="type" required>
            <option value="simple">Chambre Simple</option>
            <option value="double">Chambre Double</option>
            <option value="triple">Chambre Triple</option>
            <option value="dortoir">dortoir</option>
            <option value="dortoir_mixte">dortoir mixte</option>
            <option value="standard">standard</option>
            <option value="millieu_de_gamme">millieu de gamme</option>
            <option value="supérieure">supérieure</option>
            <option value="luxe">luxe</option>
            <option value="executive">executive</option>
            <option value="Studio">Studio</option>
            <option value="suite_junior">suite junior</option>

        </select><br><br>
    
        <input type="checkbox" id="view" name="options[]" value="view">
        <label for="view">Chambre avec vue</label><br>

        <input type="checkbox" id="ground_floor" name="options[]" value="ground_floor">
        <label for="ground_floor">Située en rez-de-chaussée</label><br>

        <input type="checkbox" id="tv_channels" name="options[]" value="tv_channels">
        <label for="tv_channels">Écran de télévision avec chaînes supplémentaires</label><br>

        <input type="checkbox" id="wifi" name="options[]" value="wifi">
        <label for="wifi">Accès au Wi-Fi</label><br>

        <input type="checkbox" id="breakfast" name="options[]" value="breakfast">
        <label for="breakfast">Petit déjeuner sur place</label><br><br>

        <label for="special_requests">Demandes particulières :</label><br>
        <textarea id="special_requests" name="demande" rows="8" cols="50">
            Entrez ici vos demandes particulières...
         </textarea><br>



        <label for="nom">nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="genre">Genre:</label>
        <select id="genre" name="genre" required>
            <option value="male">Masculin</option>
            <option value="female">Féminin</option>
            <option value="other">Autre</option>
        </select><br><br>


        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telephone">Numéro de téléphone:</label>
        <input type="text" id="telephone" name="telephone" required><br><br>

        <label for="telephone">Mot de passe:</label>
        <input type="text" id="password" name="password" required><br><br>

        <label for="paiement">Informations de paiement:</label>
        <input type="text" id="paiement" name="paiement" required><br><br>

        <label for="identite">Référence de la pièce d'identité:</label>
        <input type="text" id="identite" name="cnib" required><br><br>

        <input type="submit" name="submit" value="Réserver">
    </form>

    <style>
        /* Style général du formulaire */
        .form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        /* Style des éléments input et select du formulaire */
        .form input[type="text"],
        .form input[type="email"],
        .form input[type="password"],
        .form input[type="tel"],
        .form select {
            width: 100%;
            padding: 15px;
            /* Augmenter la taille des champs */
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        /* Style du bouton de soumission */
        .form input[type="submit"] {
            background-color: #009688;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 3px;
        }

        /* Style du bouton de soumission au survol */
        .form input[type="submit"]:hover {
            background-color: #007d65;
        }

        .form h1 {
            text-align: center;
            font-size: 1.3em;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .form input[type="number"] {
            height: 30px;
            font-size: large;
        }

        .form input[type="date"] {
            height: 20px;
            font-size: medium;
        }
    </style>

    <?php
    include("pied_de_page.php");
    ?>

</body>

</html>
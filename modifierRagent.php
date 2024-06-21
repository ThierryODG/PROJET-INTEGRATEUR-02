<?php
include 'connecte.php';
$id=$_GET['modifieid'];
$sql="select * from reservation where id=$id";
$requete="select * from client where id=$id";
$result=mysqli_query($con,$sql);
$resultat=mysqli_query($con,$requete);
$row=mysqli_fetch_assoc($result);
$rows=mysqli_fetch_assoc($resultat);
$nb_personne=$row['nb_personne'];
$date_arrive=$row['date_arrive'];
$date_depart=$row['date_depart'];
$type=$row['type'];
$options=$row['options'];
$demande=$row['demande'];
$nom=$rows['nom'];
$prenom=$rows['prenom'];
$genre=$rows['genre'];
$email=$rows['email'];
$telephone=$rows['telephone'];
$password=$rows['password'];
$information=$row['information'];
$cnib=$rows['cnib'];


if (isset($_POST['submit'])) {
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

    $sql="update reservation set id=$id,nb_personne='$nb_personne',date_arrive='$date_arrive',date_depart='$date_depart',
    type ='$type ',options='$options',demande='$demande',information='$information'where id=$id";
    $requete="update client set id=$id,nom='$nom',prenom='$prenom',genre='$genre',
    telephone='$telephone',email='$email',password='$password',cnib='$cnib'where id=$id";
    $result=mysqli_query($con,$sql);
    $resultat=mysqli_query($con,$requete);
    if($result && $resultat){
        echo " Modification reussie avec succes";
        header('location:accueilAgent.php');
    }else{
        die(mysqli_error($con));
    }

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
    include("entete.php");
    ?>

    <h1>Réservation de Chambre</h1>
    <form action="process_reservation.php" method="post" class="form">
        <label for="nb_personne">Nombre de personnes:</label>
        <input type="number" id="nb_personne" name="nb_personne" value=<?php echo $nb_personne;?> required><br><br>

        <label for="date_arrive">Date d'arrivée:</label>
        <input type="date" id="date_arrive" name="date_arrive" value=<?php echo $date_arrive;?> required><br><br>

        <label for="date_depart">Date de départ:</label>
        <input type="date" id="date_depart" name="date_depart" value=<?php echo $date_depart;?>required><br><br>

        <label for="type">Type de chambre:</label>
        <select id="type" name="type" value=<?php echo $type;?>required>
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
        <input type="checkbox" id="view" name="options[]" value=<?php echo $options;?> value="view">
        <label for="view">Chambre avec vue</label><br>

        <input type="checkbox" id="ground_floor" name="options[]" value=<?php echo $options;?> value="ground_floor">
        <label for="ground_floor">Située en rez-de-chaussée</label><br>

        <input type="checkbox" id="tv_channels" name="options[]" value=<?php echo $options;?> value="tv_channels">
        <label for="tv_channels">Écran de télévision avec chaînes supplémentaires</label><br>

        <input type="checkbox" id="wifi" name="options[]" value=<?php echo $options;?>value="wifi">
        <label for="wifi">Accès au Wi-Fi</label><br>

        <input type="checkbox" id="breakfast" name="options[]" value=<?php echo $options;?>value="breakfast">
        <label for="breakfast">Petit déjeuner sur place</label><br><br>

        <label for="demande">Demandes particulières :</label><br>
        <textarea id="demande" name="demande" value=<?php echo $demande;?> rows="8" cols="50">
            Entrez ici vos demandes particulières...
         </textarea><br>



        <label for="nom">nom:</label>
        <input type="text" id="nom" name="nom" value=<?php echo $nom;?> required><br><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value=<?php echo $prenom;?>required><br><br>

        <label for="genre">Genre:</label>
        <select id="genre" name="genre" value=<?php echo $genre;?> required>
            <option value="male">Masculin</option>
            <option value="female">Féminin</option>
            <option value="other">Autre</option>
        </select><br><br>


        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value=<?php echo $email;?>required><br><br>

        <label for="telephone">Numéro de téléphone:</label>
        <input type="text" id="telephone" name="telephone" value=<?php echo $telephone;?>required><br><br>

        <label for="telephone">Mot de passe:</label>
        <input type="text" id="password" name="password" value=<?php echo $password;?>required><br><br>

        <label for="paiement">Informations de paiement:</label>
        <input type="text" id="paiement" name="paiement" value=<?php echo $information;?> required><br><br>

        <label for="identite">Référence de la pièce d'identité:</label>
        <input type="text" id="identite" name="cnib" value=<?php echo $cnib;?>required><br><br>

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

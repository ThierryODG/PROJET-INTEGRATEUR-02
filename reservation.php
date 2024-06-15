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
        <label for="num_personnes">Nombre de personnes:</label>
        <input type="number" id="num_personnes" name="num_personnes" required><br><br>

        <label for="date_arrivee">Date d'arrivée:</label>
        <input type="date" id="date_arrivee" name="date_arrivee" required><br><br>

        <label for="date_depart">Date de départ:</label>
        <input type="date" id="date_depart" name="date_depart" required><br><br>

        <label for="type_chambre">Type de chambre:</label>
        <select id="type_chambre" name="type_chambre" required>
            <option value="simple">Chambre Simple</option>
            <option value="double">Chambre Double</option>
            <option value="triple">Chambre Triple</option>
            <option value="suite">Suite</option>
            <!-- Ajouter d'autres types de chambres si nécessaire -->
        </select><br><br>

        <label for="demande_particuliere">Demandes particulières:</label>
        <textarea id="demande_particuliere" name="demande_particuliere"></textarea><br><br>

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
        <input type="tel" id="telephone" name="telephone" required><br><br>

        <label for="paiement">Informations de paiement:</label>
        <input type="text" id="paiement" name="paiement" required><br><br>

        <label for="identite">Référence de la pièce d'identité:</label>
        <input type="text" id="identite" name="identite" required><br><br>

        <input type="submit" value="Réserver">
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

        h1 {
            text-align: center;
            font-size: 1.3em;
            margin-top: 30px;
            margin-bottom: 10px;
        }
    </style>







    <?php
    include("pied_de_page.php");
    ?>

</body>

</html>
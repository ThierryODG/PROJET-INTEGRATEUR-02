<?php

/* Ne toucher pas ce fichier j'utilise pour tester mes methodes en attendant  les formulaires*/
    include("./methode/db_methode.php");
    //db_methode::add_client("ouedraogo", "Aziz", "Masculin", "252545", "aziz@gmail.com", "azizaziz", "b452552");
    //db_methode::add_client("Mare","Daouda","Masculin","07684843","daoudamare19@gmail.com","daouda005","b11406390");
    //db_methode::genererfacturepdf();
/*
    $to = 'daoudamare19@gmail.com';
    $subject = 'Code de Reservation';
    $body = 'Voici votre code de reservation , veillez bien la conserver <strong>Nb: Votre code est personnel , ne la partager pas!!</strong></p>';

    echo bd_methode::sendcode($to, $subject, $body);

    //Test des relation entre les tbles
    $servername = "localhost"; // Votre serveur de base de données
    $username = "root"; // Votre nom d'utilisateur de base de données
    $password = ""; // Votre mot de passe de base de données
    $dbname = "gestion_hotel"; // Nom de votre base de données

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $reservation_id = 1; // ID de la réservation pour laquelle nous voulons les informations

    $sql = "SELECT r.id_chambre, h.nom AS hotel_name, c.nom AS client_name
            FROM reservation r
            JOIN client c ON r.id_client = c.id
            JOIN chambre ch ON r.id_chambre = ch.id
            JOIN hotel h ON ch.id_hotel = h.id
            WHERE r.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reservation_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID de la chambre: " . $row["id_chambre"] . "<br>";
            echo "Nom de l'hôtel: " . $row["hotel_name"] . "<br>";
            echo "Nom du client: " . $row["client_name"] . "<br>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }

    $stmt->close();
    $conn->close();
    */
?>



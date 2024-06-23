<?php


    include("./methode/db_methode.php");
    //$code= db_methode::genererCodeAleatoire();
    //db_methode::add_client("ouedraogo", "Aziz", "Masculin", "252545", "aziz@gmail.com", "azizaziz", "b452552");
    /*
    $id_client = 1;
    $id_reservation = 1;
    $date_deduction = '2024-06-13 12:00:00';
    $type_paiement = 'Carte de crédit';
    $montant = 150.75;
    */
    // Appeler la méthode statique pour ajouter un paiement
    //db_methode::addpaiement($id_client, $id_reservation, $date_deduction, $type_paiement, $montant);
    

    //db_methode::add_client("Mare","Daouda","Masculin","07684843","daoudamare19@gmail.com","daouda005","b11406390");
    db_methode::genererfacturepdf(7,5,"standart",5,"wifi");
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
    /*
    $nom = 'Laafi';
    $adresse = 'Tenkodogo';
    $categorie = '3 étoiles';
    $emplacement = 'ville de Tenkodogo';
    $description = 'Un hôtel luxueux 3 etoiles au coeur de Tenkodogo.';
    $email = 'contact@laafi.com';
    $site = 'http://laafi.com';
    $imglink="./img/room-1.jpg";

    db_methode::add_hotel($nom,$adresse,$categorie,$emplacement,$description,$email,$site,$imglink);
  
  
  //db_methode::add_chambre(4,"disponible","wifi,vu, tele",65000,1);
    */
    //db_methode::add_responsable("Mare","Daouda","Masculin","daoudamare@gmail.com","adminn","07684843");
    //db_methode::add_reservation(7,1,"12/05/2023",'24/07/2024',true,4);
    //db_methode::add_agent_reception("diakite", "Fadila","feminin", "+22665646123", "fadila@gmail.com", "fadila","b745896")

    /*
    $mail=$_POST['email'];
    $pass=$_POST['password'];
    db_methode::login($mail,$pass);
    
    if ($auth) {
        header('location:index.php');
    }
    else{
        header('location:connexion.php');
    } 
    */
    /*
    session_start();
    echo $_SESSION["email"] . ".<br>";
    */

?>



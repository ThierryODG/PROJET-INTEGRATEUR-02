<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
    class db_methode{

        public static function add_hotel($nom,$prenom,$categorie,$emplacement,$description,$email,$site,$imglink){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestion_hotel";
            
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // Configuration de PDO pour lever les exceptions en cas d'erreur
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // Chemin vers le fichier image
                $imagePath = $imglink;
                $image = file_get_contents($imagePath);
                $imageBlob = $conn->quote($image); // Échappement du contenu de l'image
            
                // Détails de l'hôtel
                /*
                $nom = 'Bravia Hotel';
                $adresse = 'Avenue Kwame Nkruma';
                $categorie = '4 étoiles';
                $emplacement = 'Centre-ville';
                $description = 'Un hôtel luxueux au cœur de ouagadougou.';
                $email = 'contact@braviahotel.com';
                $site = 'http://braviahotel.com';
                */
                // Requête SQL préparée
                $stmt = $conn->prepare("INSERT INTO hotel (nom, adresse, categorie, emplacement, photo, description, email, site) 
                                        VALUES (:nom, :adresse, :categorie, :emplacement, :photo, :description, :email, :site)");
                
                // Liaison des paramètres
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':adresse', $adresse);
                $stmt->bindParam(':categorie', $categorie);
                $stmt->bindParam(':emplacement', $emplacement);
                $stmt->bindParam(':photo', $imageBlob, PDO::PARAM_LOB); // Utilisation de PDO::PARAM_LOB pour le BLOB
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':site', $site);
            
                // Exécution de la requête
                $stmt->execute();
            
                echo "Nouvel enregistrement créé avec succès";
            } catch(PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            
            // Fermeture de la connexion
            $conn = null;
        }

        public static function add_chambre($type, $statut, $options, $prix, $id_hotel) {
                // Votre code pour se connecter à la base de données et exécuter la requête d'insertion
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "gestion_hotel";
        
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // Configuration de PDO pour lever les exceptions en cas d'erreur
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                    // Requête SQL préparée pour l'insertion
                    $stmt = $conn->prepare("INSERT INTO chambre (type, statut, options, prix, id_hotel) 
                                            VALUES (:type, :statut, :options, :prix, :id_hotel)");
                    
                    // Liaison des paramètres
                    $stmt->bindParam(':type', $type);
                    $stmt->bindParam(':statut', $statut);
                    $stmt->bindParam(':options', $options);
                    $stmt->bindParam(':prix', $prix);
                    $stmt->bindParam(':id_hotel', $id_hotel);
        
                    // Exécution de la requête
                    $stmt->execute();
        
                    echo "Nouvelle chambre ajoutée avec succès";
                } catch(PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
        
                // Fermeture de la connexion
                $conn = null;
        }
        
        public static function add_client($nom, $prenom, $genre, $telephone, $email, $password, $cnib) {
            // Votre code pour se connecter à la base de données et exécuter la requête d'insertion
            $servername = "localhost";
            $username = "root";
            $password_db = "";
            $dbname = "gestion_hotel";
    
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                // Configuration de PDO pour lever les exceptions en cas d'erreur
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Requête SQL préparée pour l'insertion
                $stmt = $conn->prepare("INSERT INTO client (nom, prenom, genre, telephone, email, password, cnib) 
                                        VALUES (:nom, :prenom, :genre, :telephone, :email, :password, :cnib)");
                
                // Liaison des paramètres
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':genre', $genre);
                $stmt->bindParam(':telephone', $telephone);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':cnib', $cnib);
    
                // Exécution de la requête
                $stmt->execute();
    
                echo "Nouveau client ajouté avec succès";
            } catch(PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
    
            // Fermeture de la connexion
            $conn = null;
        }

        public static function add_reservation($id_client, $id_hotel, $date_arrive, $date_depart, $statut_confirmation, $nb_personne) {
            // Votre code pour se connecter à la base de données et exécuter la requête d'insertion
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestion_hotel";
    
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // Configuration de PDO pour lever les exceptions en cas d'erreur
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Requête SQL préparée pour l'insertion
                $stmt = $conn->prepare("INSERT INTO reservation (id_client, id_hot$id_hotel, date_arrive, date_depart, statut_confirmation, nb_personne) 
                                        VALUES (:id_client, :id_hot$id_hotel, :date_arrive, :date_depart, :statut_confirmation, :nb_personne)");
                
                // Liaison des paramètres
                $stmt->bindParam(':id_client', $id_client);
                $stmt->bindParam(':id_hot$id_hotel', $id_hotel);
                $stmt->bindParam(':date_arrive', $date_arrive);
                $stmt->bindParam(':date_depart', $date_depart);
                $stmt->bindParam(':statut_confirmation', $statut_confirmation);
                $stmt->bindParam(':nb_personne', $nb_personne);
    
                // Exécution de la requête
                $stmt->execute();
    
                echo "Nouvelle réservation ajoutée avec succès";
            } catch(PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
    
            // Fermeture de la connexion
            $conn = null;
        }

        public static function add_responsable($nom, $prenom, $genre, $email, $password, $telephone) {
            // Votre code pour se connecter à la base de données et exécuter la requête d'insertion
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestion_hotel";
    
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // Configuration de PDO pour lever les exceptions en cas d'erreur
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Requête SQL préparée pour l'insertion
                $stmt = $conn->prepare("INSERT INTO responsable (nom, prenom, genre, email, password, telephone) 
                                        VALUES (:nom, :prenom, :genre, :email, :password, :telephone)");
                
                // Liaison des paramètres
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':genre', $genre);
                $stmt->bindParam(':telephone', $telephone);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
    
                // Exécution de la requête
                $stmt->execute();
    
                echo "Nouveau responsable ajouté avec succès";
            } catch(PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
    
            // Fermeture de la connexion
            $conn = null;
        }

        public static function add_agent_reception($nom, $prenom, $genre, $telephone, $email, $password, $cnib) {
            // Votre code pour se connecter à la base de données et exécuter la requête d'insertion
            $servername = "localhost";
            $username = "root";
            $password_db = "";
            $dbname = "gestion_hotel";
    
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                // Configuration de PDO pour lever les exceptions en cas d'erreur
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Requête SQL préparée pour l'insertion
                $stmt = $conn->prepare("INSERT INTO client (nom, prenom, genre, telephone, email, password, cnib) 
                                        VALUES (:nom, :prenom, :genre, :telephone, :email, :password, :cnib)");
                
                // Liaison des paramètres
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':genre', $genre);
                $stmt->bindParam(':telephone', $telephone);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':cnib', $cnib);
    
                // Exécution de la requête
                $stmt->execute();
    
                echo "Nouveau client ajouté avec succès";
            } catch(PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
    
            // Fermeture de la connexion
            $conn = null;
        }

        public static function addpaiement($id_client, $id_reservation, $date_deduction, $type_paiement, $montant) {

           $host = 'localhost';
           $dbname = 'gestion_hotel';
           $username = 'root';
           $password = '';
           $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';
            
            try {
                // Établir la connexion
                $pdo = new PDO($dsn, $username, $password, $options);
                
                // Préparer et exécuter la requête
                $sql = "INSERT INTO paiement (id_client, id_reservation, date_deduction, type_paiement, montant) VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id_client, $id_reservation, $date_deduction, $type_paiement, $montant]);
                
                echo "Nouveau paiement ajouté avec succès.";
            } catch (PDOException $e) {
                echo "Erreur: " . $e->getMessage();
            }
        }

        public static function addfacture($id_reservation, $id_paiement, $id_client, $detail_prestation, $somme_total) {

            $host = 'localhost';
            $dbname = 'gestion_hotel';
            $username = 'root';
            $password = '';
            $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];

            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';
            
            try {
                // Établir la connexion
                $pdo = new PDO($dsn, $username, $password, $options);
                
                // Préparer et exécuter la requête
                $sql = "INSERT INTO facture (id_reservation, id_paiement, id_client, detail_prestation, somme_total) VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id_reservation, $id_paiement, $id_client, $detail_prestation, $somme_total]);
                
                echo "Nouvelle facture ajoutée avec succès.";
            } catch (PDOException $e) {
                echo "Erreur: " . $e->getMessage();
            }
        }

        public static function genererfacturepdf($client_id,$hotel_id ,$filename ='Facture.pdf', $stream = true)
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestion_hotel";
        
            try {
                // Connexion à la base de données
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        
                // Requête SQL pour récupérer les informations sur l'hôtel
                $stmt_hotel = $conn->prepare("SELECT nom, adresse, email, site FROM hotel WHERE id = :hotel_id");
                $stmt_hotel->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
                $stmt_hotel->execute();
                $hotel = $stmt_hotel->fetch(PDO::FETCH_ASSOC);
        
                // Requête SQL pour récupérer les informations sur le client
                $stmt_client = $conn->prepare("SELECT nom, prenom, telephone, email FROM client WHERE id = :client_id");
                $stmt_client->bindParam(':client_id', $client_id, PDO::PARAM_INT);
                $stmt_client->execute();
                $client = $stmt_client->fetch(PDO::FETCH_ASSOC);
        
                // Génération du HTML pour la facture
                $html = '
                    <!DOCTYPE html>
                    <html lang="fr">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Facture de réservation</title>
                        <style>
                            table {
                                width: 100%;
                                border-collapse: collapse;
                            }
                            th, td {
                                border: 1px solid black;
                                padding: 8px;
                                text-align: left;
                            }
                            th {
                                background-color: #f2f2f2;
                            }
                            h2, h3 {
                                background-color: #B5B72D;
                                text-align: center;
                                padding: 10px;
                                color: white;
                            }
                            .info {
                                display: grid;
                                grid-template-columns: repeat(2, 1fr);
                                gap: 20px;
                                margin-bottom: 20px;
                            }
                            .box {
                                border: 1px solid #ccc;
                                padding: 10px;
                            }
                        </style>
                    </head>
                    <body>
                        <h2>Facture de réservation</h2>
                        <div class="info">
                            <div>
                                <h3>Informations sur l\'hôtel</h3>
                                <div class="box">
                                    <p><strong>Nom:</strong> ' . htmlspecialchars($hotel['nom']) . '</p>
                                    <p><strong>Adresse:</strong> ' . htmlspecialchars($hotel['adresse']) . '</p>
                                    <p><strong>Email:</strong> ' . htmlspecialchars($hotel['email']) . '</p>
                                    <p><strong>Site web:</strong> ' . htmlspecialchars($hotel['site']) . '</p>
                                </div>
                            </div>
                            <div>
                                <h3>Informations sur le client</h3>
                                <div class="box">
                                    <p><strong>Nom:</strong> ' . htmlspecialchars($client['nom']) . '</p>
                                    <p><strong>Prénom:</strong> ' . htmlspecialchars($client['prenom']) . '</p>
                                    <p><strong>Téléphone:</strong> ' . htmlspecialchars($client['telephone']) . '</p>
                                    <p><strong>Email:</strong> ' . htmlspecialchars($client['email']) . '</p>
                                </div>
                            </div>
                        </div>
                        <table>
                            <caption><h3>Informations sur la réservation</h3></caption>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Code Hôtel</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dupont</td>
                                    <td>Jean</td>
                                    <td>HTL123</td>
                                    <td>200€</td>
                                </tr>
                                <tr>
                                    <td>Martin</td>
                                    <td>Marie</td>
                                    <td>HTL124</td>
                                    <td>150€</td>
                                </tr>
                                <tr>
                                    <td>Durand</td>
                                    <td>Pierre</td>
                                    <td>HTL125</td>
                                    <td>180€</td>
                                </tr>
                            </tbody>
                        </table>
                    </body>
                    </html>
                ';

                // Initialiser Dompdf avec les options par défaut
                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true); // Autoriser les images distantes si nécessaire
                $dompdf = new Dompdf($options);
        
                // Charger le HTML dans Dompdf
                $dompdf->loadHtml($html);
        
                // Définir le format de papier et l'orientation
                $dompdf->setPaper('A4', 'portrait');
        
                // Rendre le HTML en PDF
                $dompdf->render();
        
                // Sortir le PDF dans le navigateur ou le sauvegarder sur le serveur
                if ($stream) {
                    // Sortie du PDF dans le navigateur
                    $dompdf->stream($filename, ["Attachment" => false]);
                } else {
                    // Sauvegarde du fichier PDF sur le serveur
                    file_put_contents($filename, $dompdf->output());
                }
            } catch(PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            } finally {
                // Fermer la connexion PDO
                $conn = null;
            }
        }

    public static function getHotels() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gestion_hotel";
    
        try {
            $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $stmt = $conn->prepare("SELECT id, nom, description, photo FROM hotel");
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        } finally {
            if ($conn) {
                $conn = null;
            }
        }
    }
    

    public static function login($email, $userPassword) {
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "gestion_hotel";

        // Créer une connexion à la base de données
        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Préparer et exécuter la requête SQL
        $stmt = $conn->prepare("SELECT id,email, password, nom, prenom FROM client WHERE email = ?");
        if (!$stmt) {
            die("Preparation failed: " . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Vérifier si un utilisateur avec cet email existe
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id_client,$dbEmail, $dbPassword, $dbFirstName, $dbLastName);
            $stmt->fetch();

            // Vérifier le mot de passe
            if ($userPassword == $dbPassword) {
                session_start();
                // Authentification réussie
                $_SESSION['email'] = $dbEmail;
                $_SESSION['nom'] = $dbFirstName;
                $_SESSION['prenom'] = $dbLastName;
                $_SESSION['prenom']=$id_client;

                $stmt->close();
                $conn->close();
                header("location:index.php");
            } else {
                // Mot de passe incorrect
                $stmt->close();
                $conn->close();
                header("location:connexion.php");
            }
        } else {
            // Email non trouvé
            $stmt->close();
            $conn->close();
            header("location:connexion.php");
        }
    }


    public static function loginResponsable($email, $userPassword) {
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "gestion_hotel";

        // Créer une connexion à la base de données
        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Préparer et exécuter la requête SQL
        $stmt = $conn->prepare("SELECT email, password, nom, prenom FROM responsable WHERE email = ?");
        if (!$stmt) {
            die("Preparation failed: " . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Vérifier si un utilisateur avec cet email existe
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($dbEmail, $dbPassword, $dbFirstName, $dbLastName);
            $stmt->fetch();

            // Vérifier le mot de passe
            if ($userPassword == $dbPassword) {
                session_start();
                // Authentification réussie
                $_SESSION['email'] = $dbEmail;
                $_SESSION['nom'] = $dbFirstName;
                $_SESSION['prenom'] = $dbLastName;

                $stmt->close();
                $conn->close();
                header("location:accueilAdmin.php");
            } else {
                // Mot de passe incorrect
                $stmt->close();
                $conn->close();
                header("location:connexion1.php");
            }
        } else {
            // Email non trouvé
            $stmt->close();
            $conn->close();
            header("location:connexion1.php");
        }
    }


    public static function genererCodeAleatoire($longueur = 15) {
        // Générer des octets aléatoires
        $bytes = random_bytes($longueur);
    
        // Convertir les octets en une chaîne hexadécimale
        $hex = bin2hex($bytes);
        // Retourner les premiers caractères (longueur spécifiée)
        return substr($hex, 0, $longueur);
    }
}
?>
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

        public static function add_reservation($id_client, $id_chambre, $date_arrive, $date_depart, $statut_confirmation, $nb_personne) {
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
                $stmt = $conn->prepare("INSERT INTO reservation (id_client, id_chambre, date_arrive, date_depart, statut_confirmation, nb_personne) 
                                        VALUES (:id_client, :id_chambre, :date_arrive, :date_depart, :statut_confirmation, :nb_personne)");
                
                // Liaison des paramètres
                $stmt->bindParam(':id_client', $id_client);
                $stmt->bindParam(':id_chambre', $id_chambre);
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

        public static function add_responsable($nom, $prenom, $genre, $telephone, $email, $password) {
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
                $stmt = $conn->prepare("INSERT INTO client (nom, prenom, genre, telephone, email, password) 
                                        VALUES (:nom, :prenom, :genre, :telephone, :email, :password)");
                
                // Liaison des paramètres
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':genre', $genre);
                $stmt->bindParam(':telephone', $telephone);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
    
                // Exécution de la requête
                $stmt->execute();
    
                echo "Nouveau client ajouté avec succès";
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

        public static function addacture($id_reservation, $id_paiement, $id_client, $detail_prestation, $somme_total) {

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

    public static function genererfacturepdf($filename = 'Facture.pdf', $stream = true)
    {
        $html = '
                <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Table d\'Hôtel</title>
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
                
                h2{
                    background-color: #B5B72D;
                    text-align:center;
                    font: size 25px;
                }

                h3{
                    background-color: #B5B72D;
                }

                .info {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr); /* Crée 2 colonnes de largeur égale */
                    gap: 20px; /* Espace entre les colonnes */
                }

                

                    
            </style>
        </head>
        <body>

        <h2>Facture de reservation</h2>

        <div class="info">
            <div>
                <h3>Information sur Hotel</h3>
                <div class="box">
                    <p>Nom: </p>
                    <p>Prenom: </p>
                    <p>Tel: </p>
                    <p>Email: </p>
                    <p>site: </p>
                </div>
            </div>

            <div>
                <h3>Information sur client</h3>
                <div class="box">
                    <p>Nom: </p>
                    <p>Prenom: </p>
                    <p>Tel: </p>
                    <p>Email: </p>
                </div>
            </div>

        </div>

        <table>

            <caption ><h3>Informations des Clients</h3></caption>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Chambre</th>
                    <th>Code Hôtel</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dupont</td>
                    <td>Jean</td>
                    <td>101</td>
                    <td>HTL123</td>
                    <td>200€</td>
                </tr>
                <tr>
                    <td>Martin</td>
                    <td>Marie</td>
                    <td>102</td>
                    <td>HTL124</td>
                    <td>150€</td>
                </tr>
                <tr>
                    <td>Durand</td>
                    <td>Pierre</td>
                    <td>103</td>
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
        $options->set('isRemoteEnabled', true); // Pour autoriser les images distantes
        $dompdf = new Dompdf($options);

        // Charger le HTML dans Dompdf
        $dompdf->loadHtml($html);

        // (Optionnel) Définir le format de papier et l'orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render le HTML comme PDF
        $dompdf->render();

        if ($stream) {
            // Sortie du PDF dans le navigateur
            $dompdf->stream($filename, ["Attachment" => false]);
        } else {
            // Sauvegarde le fichier PDF
            file_put_contents($filename, $dompdf->output());
        }
    }
    }
?>
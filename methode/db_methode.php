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
                // Informations de connexion à la base de données
                $servername = "localhost";
                $username = "root";
                $passwordDb = ""; // Nom différent pour éviter conflit avec le paramètre $password
                $dbname = "gestion_hotel";
        
                try {
                    // Connexion à la base de données
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passwordDb);
                    // Configuration de PDO pour lever les exceptions en cas d'erreur
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                    // Requête SQL préparée pour l'insertion
                    $stmt = $conn->prepare("INSERT INTO reservation (id_client, id_hotel, date_arrive, date_depart, statut_confirmation, nb_personne) 
                                            VALUES (:id_client, :id_hotel, :date_arrive, :date_depart, :statut_confirmation, :nb_personne)");
        
                    // Liaison des paramètres
                    $stmt->bindParam(':id_client', $id_client);
                    $stmt->bindParam(':id_hotel', $id_hotel);
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
                $stmt = $conn->prepare("INSERT INTO agent_reception (nom, prenom, genre, telephone, email, password, cnib) 
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
    
                echo "Nouveau agent ajouté avec succès";
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
        /*
        public static function genererfacturepdf($client_id, $hotel_id, $type, $nb_perso, $options, $filename = 'Facture.pdf', $stream = true) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestion_hotel";
    
            try {
                // Connexion à la base de données
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Récupération des informations de l'hôtel
                $stmt_hotel = $conn->prepare("SELECT nom, adresse, email, site FROM hotel WHERE id = :hotel_id");
                $stmt_hotel->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
                $stmt_hotel->execute();
                $hotel = $stmt_hotel->fetch(PDO::FETCH_ASSOC);
    
                if (!$hotel) {
                    throw new Exception("Hôtel introuvable");
                }
    
                // Récupération des informations du client
                $stmt_client = $conn->prepare("SELECT nom, prenom, telephone, email FROM client WHERE id = :client_id");
                $stmt_client->bindParam(':client_id', $client_id, PDO::PARAM_INT);
                $stmt_client->execute();
                $client = $stmt_client->fetch(PDO::FETCH_ASSOC);
    
                if (!$client) {
                    throw new Exception("Client introuvable");
                }
    
                // Génération des options en HTML
                $optionsHtml = '';
                foreach ($options as $option) {
                    $optionsHtml .= '<li>' . htmlspecialchars($option) . '</li><br>';
                }
    
                // HTML de la facture
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
                                    <th>Type</th>
                                    <th>NB Personne</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>' . htmlspecialchars($type) . '</td>
                                    <td>' . htmlspecialchars($nb_perso) . '</td>
                                </tr>
                            </tbody>
                        </table>
                        <h3>Options</h3>
                        <ul>
                            ' . $optionsHtml . '
                        </ul>
                    </body>
                    </html>
                ';
    
                // Initialisation de Dompdf avec les options par défaut
                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true); // Autoriser les images distantes si nécessaire
                $options->set('debugPng', true);
                $options->set('debugKeepTemp', true);
                $dompdf = new Dompdf($options);
    
                // Charger le HTML dans Dompdf
                $dompdf->loadHtml($html);
    
                // Définir le format de papier et l'orientation
                $dompdf->setPaper('A4', 'portrait');
    
                // Rendre le HTML en PDF
                $dompdf->render();
    
                // Sortir le PDF dans le navigateur ou le sauvegarder sur le serveur
                if ($stream) {
                    // Forcer le téléchargement du PDF
                    $dompdf->stream($filename, ["Attachment" => true]);
                } else {
                    // Sauvegarde du fichier PDF sur le serveur
                    file_put_contents($filename, $dompdf->output());
                    echo 'PDF saved on server: ' . $filename;
                    exit();
                }
            } catch (PDOException $e) {
                echo "Erreur PDO : " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erreur générale : " . $e->getMessage();
            } finally {
                // Fermer la connexion PDO
                $conn = null;
            }
        }

        */

        public static function genererFacturePdf(int $client_id, int $hotel_id, string $type, int $nb_perso, string $filename = 'Facture.pdf', bool $stream = true) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestion_hotel";
    
            try {
                // Connexion à la base de données
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Récupération des informations de l'hôtel
                $stmt_hotel = $conn->prepare("SELECT nom, email, site FROM hotel WHERE id = :hotel_id");
                $stmt_hotel->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
                $stmt_hotel->execute();
                $hotel = $stmt_hotel->fetch(PDO::FETCH_ASSOC);
    
                if (!$hotel) {
                    throw new Exception("Hôtel introuvable");
                }
    
                // Récupération des informations du client
                $stmt_client = $conn->prepare("SELECT nom, prenom, telephone, email FROM client WHERE id = :client_id");
                $stmt_client->bindParam(':client_id', $client_id, PDO::PARAM_INT);
                $stmt_client->execute();
                $client = $stmt_client->fetch(PDO::FETCH_ASSOC);
    
                if (!$client) {
                    throw new Exception("Client introuvable");
                }
                /*
                // Génération des options en HTML
                $optionsHtml = '';
                foreach (explode(',', $options) as $option) {
                    $optionsHtml .= '<li>' . htmlspecialchars(trim($option)) . '</li>';
                }
                */
                $valeurs = array(50000, 65000, 80000, 95000, 125000, 150000, 175000, 200000, 250000);

                // Génération d'un index aléatoire
                $index = rand(0, count($valeurs) - 1);

                // Récupération de la valeur aléatoire
                $valeurAleatoire = $valeurs[$index];
                // HTML de la facture
                $html = '
                    <!DOCTYPE html>
                    <html lang="fr">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Facture de réservation</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                margin: 0;
                                padding: 20px;
                                background-color: #f4f4f4;
                                color: #333;
                            }
                            h1 {
                                color: #ff6600;
                                text-align: center;
                                margin-bottom: 20px;
                            }
                            .facture-table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-bottom: 20px;
                            }
                            .facture-table th, .facture-table td {
                                border: 1px solid #ddd;
                                padding: 8px;
                                text-align: left;
                            }
                            .facture-table th {
                                background-color: #ff6600;
                                color: white;
                            }
                            .total {
                                text-align: right;
                                font-size: 18px;
                                font-weight: bold;
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
                        <h1>Facture de Réservation</h1>
                        <div class="info">
                            <div>
                                <h3>Informations sur l\'hôtel</h3>
                                <div class="box">
                                    <p><strong>Nom:</strong> ' . htmlspecialchars($hotel['nom']) . '</p>
                                    <p><strong>Email:</strong> ' . htmlspecialchars($hotel['email']) . '</p>
                                    <p><strong>Site:</strong> ' . htmlspecialchars($hotel['site']) . '</p>
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
                        <table class="facture-table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>NB Personne</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>' . htmlspecialchars($type) . '</td>
                                    <td>' . htmlspecialchars($nb_perso) . '</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="total">Total:'.$valeurAleatoire.' FCFA</p>
                    </body>
                    </html>
                ';
    
                // Initialisation de Dompdf avec les options par défaut
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
                    // Forcer le téléchargement du PDF
                    $dompdf->stream($filename, ["Attachment" => false]);
                } else {
                    // Sauvegarde du fichier PDF sur le serveur
                    file_put_contents($filename, $dompdf->output());
                }
            } catch (PDOException $e) {
                echo "Erreur PDO : " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erreur générale : " . $e->getMessage();
            } finally {
                // Fermer la connexion PDO
                if ($conn) {
                    $conn = null;
                }
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
                $_SESSION['id']=$id_client;

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

    public static function getReservationsByClientId($clientId) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gestion_hotel";
    
        try {
            $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM reservation WHERE id_client = :clientId");
            $stmt->bindParam(':clientId', $clientId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return [];
        }
    }

    public static function gethotelname($h_id){
    
        // Informations de connexion à la base de données
        $servername = "localhost"; // Nom du serveur (généralement localhost)
        $username = "root"; // Nom d'utilisateur de la base de données
        $password = ""; // Mot de passe de la base de données
        $dbname = "gestion_hotel"; // Nom de la base de données

        // Créer une connexion
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }

        // ID de l'hôtel que vous souhaitez récupérer
        $hotel_id = $h_id; // Remplacez par l'ID réel de l'hôtel

        // Préparer la requête SQL
        $sql = "SELECT nom FROM hotel WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $hotel_id);
        $stmt->execute();
        $stmt->bind_result($hotel_name);
        $stmt->fetch();

        // Vérifier si un nom d'hôtel a été trouvé
        if ($hotel_name) {
            echo $hotel_name;
        } else {
            echo "Aucun hôtel trouvé avec l'ID " . $hotel_id;
        }

        // Fermer la déclaration et la connexion
        $stmt->close();
        $conn->close();
    }

    public static function deleteReservation($reservationId) {
        // Connexion à la base de données
        $conn = new mysqli("localhost", "root", "", "gestion_hotel");

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Préparer la requête de suppression
        $sql = "DELETE FROM reservation WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // Vérifier si la préparation de la requête a réussi
        if ($stmt === false) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }

        $stmt->bind_param("i", $reservationId);
        $stmt->execute();

        // Fermer la déclaration et la connexion
        $stmt->close();
        $conn->close();
    }

    public static function confirmReservation($reservationId) {
        // Connexion à la base de données
        $conn = new mysqli("localhost", "root", "", "gestion_hotel");

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Préparer la requête de mise à jour
        $sql = "UPDATE reservation SET statut_confirmation = 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // Vérifier si la préparation de la requête a réussi
        if ($stmt === false) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }

        $stmt->bind_param("i", $reservationId);
        $stmt->execute();

        // Fermer la déclaration et la connexion
        $stmt->close();
        $conn->close();
    }

}
?>
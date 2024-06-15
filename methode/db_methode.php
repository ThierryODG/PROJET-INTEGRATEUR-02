<?php
    class bd_methode{

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
                $username = "username";
                $password = "password";
                $dbname = "database_name";
        
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
            $username = "username";
            $password_db = "password";
            $dbname = "database_name";
    
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
            $username = "username";
            $password = "password";
            $dbname = "database_name";
    
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
            $username = "username";
            $password_db = "password";
            $dbname = "database_name";
    
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password_db);
                // Configuration de PDO pour lever les exceptions en cas d'erreur
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Requête SQL préparée pour l'insertion
                $stmt = $conn->prepare("INSERT INTO client (nom, prenom, genre, telephone, email, password, cnib) 
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
            $username = "username";
            $password_db = "password";
            $dbname = "database_name";
    
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
    }
?>
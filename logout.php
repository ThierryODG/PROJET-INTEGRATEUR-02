<?php
    // Démarrer la session
    session_start();

    // Vider toutes les variables de session
    $_SESSION = array();

    // Si vous souhaitez détruire le cookie de session aussi, utilisez cette méthode
    // Note : Ceci détruira le cookie de session, pas les cookies stockés par le navigateur
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Détruire la session
    session_destroy();

    // Rediriger l'utilisateur vers la page de connexion (ou toute autre page souhaitée)
    header("Location: connexion.php");
    exit();
?>

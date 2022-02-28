<?php
// Avec une requete POST generalemnt on charge les données d'un formulaire

// Verification du type de requete
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    // echo("La requete est de type POST");
    if (isset($_REQUEST["action"])) {
        // L'action a executer
        $action=$_REQUEST["action"];
        switch ($action) {
            case 'connexion':
                echo("Je veux me connecter");
                break;

                case 'deconnexion':
                    echo("Je veux me deconnecter");
                    break;
            
            default:
                # code...
                break;
        }
    }

    
}
// Avec une requete GET generalemnt on charge une page
if ($_SERVER["REQUEST_METHOD"]=="GET") {
    // echo("La requete est de type GET");
    if (isset($_REQUEST["action"])) {
        // L'action a executer
        $action=$_REQUEST["action"];
        switch ($action) {
            case 'accueil':
                // echo("Bienvenue au jeu");
                // Chargement de la page Accueil
                require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");
                break;

            default:
                # code...
                break;
        }
    
}

}
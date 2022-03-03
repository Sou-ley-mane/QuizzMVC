        <?php
        // Le controleur charge le model
require_once(DOSSIER_SRC."models".DIRECTORY_SEPARATOR."user.model.php" );

        // Avec une requete POST generalemnt on charge les données d'un formulaire
        // var_dump($_SERVER["REQUEST_METHOD"]);die;

        // Verification du type de requete
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            // echo("La requete est de type POST");
            if (isset($_REQUEST["action"])) {
                // L'action a executer
                $action=$_REQUEST["action"];
                switch ($action) {
                    case 'accueil':
                        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");

                        // echo("Bienvenu sur la page d'accueil");
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
                // Vérification de la connexion de l'utilisateur avant l'action
    if (!is_connect()) {
        // die("non connecter");
        header("location:".WEB_ROOT);
        exit();
    }

            switch ( $_REQUEST["action"]) {
                case 'accueil':
                    // Chargement de la page Accueil
                    require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");
                    break;

                    case 'liste.Joueur':
                        listeJoueur();
                        break;
                default:
                    # code...
                    break;
            }
        
    
        }

        }


        // Liste des joueurs
        function listeJoueur(){
            // Appel du model
            $donnees=listeDesUtilisateurs("PROFIL_JOUEUR");
            // var_dump($donnees);die;
// var_dump($donnees);
            // Chargement de la vue
            require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."Liste.joueurs.html.php");

            // die("ok");



        }
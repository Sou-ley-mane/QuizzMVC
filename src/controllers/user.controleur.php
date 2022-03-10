        <?php
        // Le controleur charge le model
require_once(DOSSIER_SRC."models".DIRECTORY_SEPARATOR."user.model.php" );

        // Verification du type de requete
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            if (isset($_REQUEST["action"])) {
                $action=$_REQUEST["action"];
                switch ($action) {
                    case 'accueil':
                        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");
                        break;
                }
            }
            
        }
        // Avec une requete GET generalemnt on charge une page
        if ($_SERVER["REQUEST_METHOD"]=="GET") {
        
            if (isset($_REQUEST["action"])) {
    if (!is_connect()) {
        header("location:".WEB_ROOT);
        exit();
    }

            switch ( $_REQUEST["action"]) {
                case 'accueil':
                    if (Administrateur()) {
                        listeJoueur(); 

                    }elseif (Joueur()) {
                        jeu();

                // ;     LesQuestion();

                    }
                    break;

                    case 'liste.Joueur':

                        listeJoueur();
                        break;
                        case 'liste.question':
                            LesQuestion();
                            // echo("Liste des question");
                            break;

                            case 'inscription':
                                inscritAdmin();
                                // echo("Liste des question");
                                break;
                                case 'creeQuestion':
                                    Question();
                                    break;


            }
        
    
        }

        }


        // Liste des joueurs
        function listeJoueur(){
            // chargement temporaire du contenu d'un fichier
            ob_start();
            // Appel du model
            $donnees=listeDesUtilisateurs("PROFIL_JOUEUR");
            // $items=pagination($donnees);
            // var_dump($items);die;
            // $items=pagination($donnees);
            // var_dump($items);die;
            // pagination($donnees);
    $page = (!empty($_GET['page']) && $_GET['page'] > 0) ? intval($_GET['page']) : 1;
    $limit = 5;
    $totalPages = ceil(count($donnees) / $limit);
    // define("MIN","MAX");
    $page = max($page, 1);
    $page = min($page, $totalPages);
    $offset = ($page - 1) * $limit;
    $offset = ($offset < 0) ? 0 : $offset;
    $items = array_slice( $donnees, $offset, $limit); 
    // var_dump(   $items );die;

            require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."Liste.joueurs.html.php");
            $contenu_vues=ob_get_clean();
            require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");

        }
        // *************************************
        function LesQuestion(){
            // chargement temporaire du contenu d'un fichier
            ob_start();
            // Appel du model
            $donnees=listeDesQuestion("questions");
            // Chargement de la vue
            require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."Liste.question.html.php");
            $contenu_vues=ob_get_clean();
            require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");

        }


        // ***********************

        function jeu(){
            // chargement temporaire du contenu d'un fichier
            ob_start();
            // Appel du model
            // $donnees=listeDesUtilisateurs("PROFIL_JOUEUR");
            // Chargement de la vue
            require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."jeu.html.php");
            $contenu_vues=ob_get_clean();
            require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");

        }
        // ********************************************
        function Question(){
            // chargement temporaire du contenu d'un fichier
            ob_start();
          
            require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."creeQuestion.html.php");
            $contenu_vues=ob_get_clean();
            require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");

        }

        // **********************************************
        function inscritAdmin(){
            // chargement temporaire du contenu d'un fichier
            ob_start();
    
            require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."inscription.html.php");
            $contenu_vues=ob_get_clean();
            require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");

        }

// $donnees=listeDesUtilisateurs("PROFIL_JOUEUR");   

//     function pagination(array $tabDonnees){
//     $page = (!empty($_GET['page']) && $_GET['page'] > 0) ? intval($_GET['page']) : 1;
//     $limit = 5;
//     $totalPages = ceil(count($tabDonnees) / $limit);
//     // define("MIN","MAX");
//     $page = max($page, 1);
//     $page = min($page, $totalPages);
//     // **************************************
//     $offset = ($page - 1) * $limit;
//     $offset = ($offset < 0) ? 0 : $offset;

   
//     // var_dump( $page);die;
//     // *************************************
//     $items = array_slice( $tabDonnees, $offset, $limit);
//   return $items;

// }

function pagination($tabDonnees):array{
    $page = (!empty($_GET['page']) && $_GET['page'] > 0) ? intval($_GET['page']) : 1;
    $limit = 5;
    $totalPages = ceil(count($tabDonnees) / $limit);
    // define("MIN","MAX");
    $page = max($page, 1);
    $page = min($page, $totalPages);
    $offset = ($page - 1) * $limit;
    $offset = ($offset < 0) ? 0 : $offset;
    $items = array_slice($tabDonnees, $offset, $limit); 
    return   $items;
}




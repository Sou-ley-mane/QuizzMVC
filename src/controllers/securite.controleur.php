<?php

// Le controleur charge le model
require_once(DOSSIER_SRC."models".DIRECTORY_SEPARATOR.user.model.php );
// Avec une requete POST generalemnt on charge les données d'un formulaire

// Verification du type de requete
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    // echo("La requete est de type POST");
    if (isset($_REQUEST["action"])) {
        // L'action a executer
        $action=$_REQUEST["action"];
        switch ($action) {
            case 'connexion':

                // Recuperation des données du user
                $login=$_POST['login'];
                $password=$_POST['password'];
                // Appel de la fonction connexion
                connexion($login,$password);

                // echo("Je veux me connecter");
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

// *************************************************************************
// *************************************************************************

// Avec une requete GET generalemnt on charge une page
if ($_SERVER["REQUEST_METHOD"]=="GET") {
    // echo("La requete est de type GET");
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
    
}else {
    echo("Bienvenue dans la page de connexion");
    
}
}

// ************************************************************************
// ************************************************************************
// Creation de la fonction connexion
function connexion(string $login,string $password):void{
    // validation des données qui est gerer par le validator 
    $errors=[];
    // la cle correspond au name du formulaire
    champ_obligatoire('login',$login,$errors,$message="Login obligatoire");
// on compte le nombre d'erreur
    if (count($errors==0)) {
        // est ce que login==email
        valid_email('login',$login,$errors);   
    }

    // ***********************************************************
    champ_obligatoire('password',$password,$errors,$message="Mot de passe obligatoire");
    if (count($errors==0)) {
        valid_password('password',$password,$message);  


        // Appel d'une fonction models
        $user=correspondance_login_password($login,$password);

    }

    else {
        // Senarios d'alternance \\Erreur de validation
       $_SESSION['errors']=$errors;
       header("location:".WEB_ROOT);
    //    Arrete la redirection
       exit();
    }


}
<?php

// Le controleur charge le model
require_once(DOSSIER_SRC."models".DIRECTORY_SEPARATOR."user.model.php" );
// Avec une requete POST generalemnt on charge les données d'un formulaire
// die("Hello");
// var_dump($_SERVER["REQUEST_METHOD"]);
// Verification du type de requete
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    // echo("La requete est de type POST");
    if (isset($_REQUEST["action"])) {
        // L'action a executer

        switch ($_REQUEST["action"]) {
            case 'connexion':
                // Recuperation des données du user
                $login=$_POST['login'];
                $password=$_POST['password'];
                // Appel de la fonction connexion
                connexion($login,$password);
                // echo("Je veux me connecter");
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
        switch ($_REQUEST["action"]) {
            case 'connexion':
                // echo("Je veux me connecter");
                // Chargement de la page connexion
                require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");

                break;

   
            default:
                # code...
                break;
        }
    
}else {
    // echo("Bienvenue dans la page de connexion");
    require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");

    
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
    if (count($errors)==0) {
        // die("Hello");

        // est ce que login==email
        valid_email('login',$login,$errors);   
    }
  

    // ***********************************************************
    champ_obligatoire('password',$password,$errors,$message="Mot de passe obligatoire");

    if (count($errors)==0) {
      // valid_password('password',$password,$message);  
        // Appel d'une fonction models
        $user=correspondance_login_password($login,$password);
// var_dump($user);die;
        // var_dump($user);die;
        // l'existence de l'utilisateur
        if (count($user)!=0) {
            // die("if");
           $_SESSION[CLE_USER_CONNECT]=$user;
        //    die("Bienvenue sue la page d'accueil");
        //    *******************************A continuer**************
        //    require_once();
           header("Location:".WEB_ROOT."?controleur=user&action=accueil");

// Si la connexion s'est bien passé redirection vers la page d'accueil
         
        }else {
            // die("else");
       $errors[CLE_ERREURS]="Login ou mot de passe incorrect";
            $_SESSION[CLE_ERREURS]=$errors;
// die("vos donnees ne son pas valides");
            header("location:".WEB_ROOT);
            //    Arrete la redirection
               exit();
           
        }

    }

    else {

        // Senarios d'alternance \\Erreur de validation
       $_SESSION[CLE_ERREURS]=$errors;
       header("location:".WEB_ROOT);
    //    Arrete la redirection
       exit();
    }


}
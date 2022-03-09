<?php

// Le controleur charge le model
require_once(DOSSIER_SRC."models".DIRECTORY_SEPARATOR."user.model.php" );

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(isset($_REQUEST["action"])){
            // Recuperation des données du user
            $login=trim($_POST['login']) ;
            $password=trim($_POST['password']);
            $prenom=trim($_POST['prenom']);
            $nom=trim($_POST['nom']);
            $password2=trim($_POST['password2']);
      
         switch ($_REQUEST["action"]) {
            case 'connexion':
                connexion($login,$password);
                break;
                case 'compte':
                    inscription($nom,$prenom,$login,$password,$password2); 
                break;
            
        } 
    }   
}

// **********************************************************************
// Avec une requete GET generalemnt on charge une page
if ($_SERVER["REQUEST_METHOD"]=="GET") {
    if(isset($_REQUEST["action"])){  
        switch ($_REQUEST["action"]) {
            case 'connexion':  
                // Chargement de la page connexion
                require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");
            break;

            case 'inscription':
                require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."haut.inc.html.php");
                require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."inscription.html.php");
                require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."bas.inc.html.php");
                break;

            case 'deconnexion':
            // Fonctoin pour deconnecter l'utilisateur
                deconnecter();
            break;
        } 
    }else {
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
    champ_obligatoire('login',$login,$errors,$message="le  Login est  obligatoire");
// on compte le nombre d'erreur
    if (count($errors)==0) {
        valid_email('login',$login,$errors);   
    }
    // ***********************************************************
    champ_obligatoire('password',$password,$errors,$message="Mot de passe obligatoire");
    if (count($errors)==0) {   
      valid_password('password',$password,$errors);  
        $user=correspondance_login_password($login,$password);
        if (count($user)!=0) { 
           $_SESSION['user']=$user;
           header("Location:".WEB_ROOT."?controleur=user&action=accueil");
             exit();
// Si la connexion s'est bien passé redirection vers la page d'accueil
         
        }else {
            
       $errors['connexion']="Login ou mot de passe incorrect";
       $_SESSION['errors']=$errors;
            header("location:".WEB_ROOT);
               exit();
           
        }

    }

    else {
        // Senarios d'alternance \\Erreur de validation
       $_SESSION['errors']=$errors;
       header("location:".WEB_ROOT);
       exit();
    }


}

// Fonction deconnexion
function deconnecter(){
    session_destroy();
    session_unset();
    header("location:".WEB_ROOT);
    exit();

}



// fonction validation de compte des utilisateurs
function inscription(string $nom,string $prenom, string $login, string $password,string $password2):void{
    $errors=[];
    champ_obligatoire('prenom',$prenom,$errors,$message="Veillez saisir votre prenom");
    champ_obligatoire('nom',$nom,$errors,$message="Veillez saisir votre nom");
    champ_obligatoire('login',$login,$errors,$message="le  Login est  obligatoire");
    if (!isset($errors['login'])){
        valid_email('login',$login,$errors); 

    }

    champ_obligatoire('password',$password,$errors,$message="le  password est  obligatoire");
    if (!isset($errors['password'])){
        // valid_email('login',$login,$errors); 
        valid_password('password',$password,$errors); 
  
    }

    champ_obligatoire('password2',$password2,$errors,$message="obligatoire");
    if (!isset($errors['password2'])){
        passwordNoMatch('password2',$password,$password2,$errors); 
    }

if (count($errors)==0) {
    $result=userArray();
    tableau_en_chaine('user', $result);
    require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");

        }else {
            $util=correspondance_login($login);
        if (count($util)!=0) {
            $errors['login']="le login existe déja";
         $_SESSION['errors']=$errors;
            header("Location:".WEB_ROOT."?controleur=securite&action=inscription");        
        }else {
            $_SESSION['errors']=$errors;
            header("Location:".WEB_ROOT."?controleur=securite&action=inscription"); 
        }
  }

}

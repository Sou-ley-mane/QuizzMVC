<?php

// Le controleur charge le model
require_once(DOSSIER_SRC."models".DIRECTORY_SEPARATOR."user.model.php" );

// Verification du type de requete
if ($_SERVER["REQUEST_METHOD"]=="POST") {


    // echo("La requete est de type POST");
    // if (isset($_REQUEST["action"])) {
        // if($_REQUEST["action"]=="compte"){
        //     $prenom=$_POST['prenom'];
        //     $nom=$_POST['nom'];
        //     $login=$_POST['login'];
        //     $password=$_POST['password'];
        //     $password2=$_POST['password2'];
        //     if($password!=$password2){
        //      champ_obligatoire('prenom',$prenom,$errors,"Veillez saisir votre prenom");

                // var_dump($prenom);
                // die("password no match");

            // }
            
            // compte($nom,$prenom,$login,$password,$password2);
            // champ_obligatoire('prenom',$prenom,$errors,"Veillez saisir votre prenom");
            
    //     }
    // }else {
    //     // Senarios d'alternance \\Erreur de validation
    //    $_SESSION['errors']=$errors;
    //    header("location:".WEB_ROOT);
    // //    Arrete la redirection
    //    exit();
    // }
         switch ($_REQUEST["action"]) {
            case 'connexion':
                // Recuperation des données du user
                $login=$_POST['login'];
                $password=$_POST['password'];
                // Appel de la fonction connexion
                
                connexion($login,$password);
                // echo("Je veux me connecter");
                break;
                // ****************************Creation de compte************************************
                case 'compte':
              
         require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");
                    
                    
                break;
                // ********************************************

            default:
                # code...
                break;
        } 
    // }   
}

// *************************************************************************
// *************************************************************************

// Avec une requete GET generalemnt on charge une page
if ($_SERVER["REQUEST_METHOD"]=="GET") {
   // var_dump($_SERVER["REQUEST_METHOD"]); 

    // echo("La requete est de type GET");
    if(isset($_REQUEST["action"])){  
        switch ($_REQUEST["action"]) {
            case 'connexion':  
                // Chargement de la page connexion
                require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");
            break;
            case 'inscription':
            // header("location:".DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."inscription.html.php");
                // Chargement de la page connexion
                require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."haut.inc.html.php");
                require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."inscription.html.php");
                require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."bas.inc.html.php");
                break;

            case 'deconnexion':
            // Fonctoin pour deconnecter l'utilisateur
                deconnecter();

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
    champ_obligatoire('login',$login,$errors,$message="le  Login est  obligatoire");
// on compte le nombre d'erreur
    if (count($errors)==0) {
        // die("Hello");
        // est ce que login==email
        valid_email('login',$login,$errors);   
    }
  

    // ***********************************************************
    champ_obligatoire('password',$password,$errors,$message="Mot de passe obligatoire");

    if (count($errors)==0) {   
    

      valid_password('password',$password,$errors);  
        $user=correspondance_login_password($login,$password);

        if (count($user)!=0) {
            
            // die("if");
           $_SESSION['user']=$user;
        //    die("Bienvenue sue la page d'accueil");

           header("Location:".WEB_ROOT."?controleur=user&action=accueil");
exit();
// Si la connexion s'est bien passé redirection vers la page d'accueil
         
        }else {
            // die("else");
       $errors['connexion']="Login ou mot de passe incorrect";

            $_SESSION['errors']=$errors;
       
// die("vos donnees ne son pas valides");
            header("location:".WEB_ROOT);
            //    Arrete la redirection
               exit();
           
        }

    }

    else {
        // Senarios d'alternance \\Erreur de validation
       $_SESSION['errors']=$errors;
   

       header("location:".WEB_ROOT);
    //    Arrete la redirection
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
function compte(string $nom,string $prenom, string $login, string $password,string $password2):void{
    
    $errors=[];
    champ_obligatoire('prenom',$prenom,$errors,$message="Veillez saisir votre prenom");
    champ_obligatoire('nom',$nom,$errors,$message="Veillez saisir votre nom");
    champ_obligatoire('login',$login,$errors,$message="le  Login est  obligatoire");
    if (count($errors)==0) {
        // est ce que login==email
        valid_email('login',$login,$errors);   
    }
    champ_obligatoire('password',$password,$errors,$message="Mot de passe obligatoire");
    if (count($errors)==0) {
    //    Valide mot dot de passe
    valid_password('password',$password,$errors);  

    }

    champ_obligatoire('password2',$password2,$errors,$message="Confirmer votre mot de passe");
    if (count($errors)==0) {
        //    Valide mot de passe 2
        valid_password2('password2',$password,$errors);  

        // ************************************************************
      

        $utilisateur=existeCompte($login);
        if (count($utilisateur)!==0) {
            // die("compte existe");
          $errors['compte-existant']="le compte existe déja merci d'entre un nouveau login";

        }else {
            echo("Votre compte a été créer avec succé");
        
            require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");
            

        
        }

        }




}


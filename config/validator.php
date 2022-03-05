<?php

function champ_obligatoire(string $cle,string $donnees,array &$errors,string
$message="Veillez remplir ce champ"){
if(empty($donnees)){
$errors[$cle]=$message;
}
}
// ***********************************************************************************
function valid_email(string $cle,string $donnees,array &$errors,string $message=" format email
invalid"){
    $valider=preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',$donnees);
    if (!$valider) {
        $errors[$cle]=$message;
       
    }

// if(!filter_var($donnees,FILTER_VALIDATE_EMAIL)){
// $errors[$cle]=$message;
// }
}

// ********************************A FAIRE *********************************
function valid_password(string $cle,string $donnees,array &$errors,string $message="Merci de vérifier le format de votre mot de passe"){
    $valider=preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/',$donnees);
    if (!$valider) {
        $errors[$cle]=$message;
       
    }
}






// ******************A REVOIRE *******************
// function valid_password(string $cle,string $donnees,array &$errors,string $message=" format mot de passe invalid"){
//     if (!strcmp("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/", $donnees)){
//     $errors[$cle]=$message;
// // echo ’L\’adresse ’ . $_POST[’mail’] . ’ est <strong>valide</strong> !’;
// }

// }



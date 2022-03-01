<?php

function champ_obligatoire(string $cle,string $donnees,array &$errors,string
$message="Veillez remplir ce champ"){
if(empty($donnees)){
$errors[$cle]=$message;
}
}
// ***********************************************************************************
function valid_email(string $cle,string $donnees,array &$errors,string $message="email
invalid"){
if(!filter_var($donnees,FILTER_VALIDATE_EMAIL)){
$errors[$cle]=$message;
}
}

// ********************************A FAIRE *********************************
function valid_password(string $cle,string $donnees,array &$errors,string $message="mot de passe
invalid"){
if(!filter_var($donnees,FILTER_VALIDATE_EMAIL)){
$errors[$cle]=$message;
}
}
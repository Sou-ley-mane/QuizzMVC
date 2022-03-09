<?php

// GESTION DES AUTORISATTIONS
define("ADMIN","PROFIL_ADMIN");
define("JOUEUR","PROFIL_JOUEUR");

// fonction pour recuperer les utilisateur connecter
function is_connect(): bool{
    return isset($_SESSION['user']);
    
}
// Fonction pour verifier si l'utilisateur est un administrateur
function Administrateur():bool{
   return is_connect() && $_SESSION['user']['profil']==ADMIN;
    
}
// Fonction pour verifier si l'utilisateur est un joueur
function Joueur():bool{
    return is_connect() && $_SESSION['user']['profil']==JOUEUR;
    
}
<?php

// verification des donnees
function correspondance_login_password(string $login,string $password):array{
    // orm
    $users=chaine_en_tableau("user");
   

    foreach ($users as $user) {
        // s'il y'a une correspondance on a le user
    if( $user['login']==$login && $user['password']==$password)
    return $user;
    }
    return [];
    }

// Fonction pour lister les utilisateurs
    function listeDesUtilisateurs(string $profil):array{
        $users=chaine_en_tableau("user");
        $liste=[];
        foreach ($users as $user) {
            if ($user['profil']==$profil) {
               $liste[]=$user;
            }
           
        }
return $liste;
    }
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
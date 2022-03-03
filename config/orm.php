<?php
// L'ORM est l'intermediare entre le model et la source de données

// cle dans notre fichier json
function chaine_en_tableau(string $cle):array{
    // Recuperation du contenu de notre fichier Json dans l'orm
$donnes=file_get_contents(DOSSIER_DATA);
// var_dump($donnes);die;
// Transformation des données ($donnes) en tableau 
$tableau=json_decode($donnes,true);
return $tableau[$cle];
}
// var_dump($tableau[$cle]);die;

// *************************************************************
// Enregistrement et mis a jour des données du fichier
function tableau_en_chaine(string $cle,array $tableau):string{
    // Recuperation du contenu de notre fichier Json dans l'orm
$donnes=file_get_contents($tableau);
// Transformation des données ($donnes) en tableau 
$chaine=json_encode($donnes,true);
// return ["$cle"];
return $chaine;
}




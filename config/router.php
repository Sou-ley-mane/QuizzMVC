<?php

if (isset($_REQUEST['controleur'])) {
// Selection du type de controleur par le router
    switch ($_REQUEST['controleur']) {
        case 'securite':
            require_once(DOSSIER_SRC."controllers".DIRECTORY_SEPARATOR."securite.controleur.php");
            break;
            case 'user':
                require_once(DOSSIER_SRC."controllers".DIRECTORY_SEPARATOR."user.controleur.php");
                break;
       
    }

} else {

    // Par défaut on charge le controleur secirite
    require_once(DOSSIER_SRC."controllers".DIRECTORY_SEPARATOR."securite.controleur.php");   
}
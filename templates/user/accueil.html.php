

<div class="entete1">
    <img class="logo" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."logo-QuizzSA.png"?>" alt="">
    <h1>LE PLAISIR DE JOUER</h1>
    

</div>

<!-- ********************************** -->
<div class="entete">
    <h1>CRÉER ET PARAMETRER VOS QUIZZ</h1>
    <button class="btn"><a href="<?=WEB_ROOT."?controleur=securite&action=deconnexion"?>">Deconnexion</a></button>

</div>



<div class="contenu">
    <!-- ********************************* -->
    <div class="icone-form">

        <div class="profil">
            <img class="photo" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."img-bg.jpg"?>" alt="PROFIL">
            <h1>Souleymane</h1>
        </div>

        <div class="formulaire">
        <a href="<?=WEB_ROOT."?controleur=user&action=accueil" ?>">Liste Questions  <img class="ok" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-liste-active.png"?>" alt="PROFIL"></a>

        <a href="<?=WEB_ROOT."?controleur=user&action=accueil" ?>">Créer Admin <img class="ok"  src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-ajout-réponse.png"?>" alt="PROFIL"></a>
  <?php if (Administrateur()):?> 
        <a href="<?=WEB_ROOT."?controleur=user&action=liste.Joueur" ?>">Liste des joueurs <img class="ok"  src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-liste.png"?>" alt="PROFIL"></a>
        <?php endif ?>
        <a href="<?=WEB_ROOT."?controleur=user&action=accueil" ?>">Créer Questions <img class="ok"  src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-ajout-réponse.png"?>" alt="PROFIL"></a>

        </div>

    </div>
    <!-- *********************** -->
    <div class="lister">
     


    </div>


</div>


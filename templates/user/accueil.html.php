
    <header>
    <nav>
        <a href="<?=WEB_ROOT."?controleur=user&action=accueil" ?>">Accueil</a>
<!-- **************************************** -->
  <?php if (Administrateur()):?> 
        <a href="<?=WEB_ROOT."?controleur=user&action=liste.Joueur" ?>">Liste des joueurs</a>
        <?php endif ?>
        <!-- ************************** -->
        <a href="<?=WEB_ROOT."?controleur=securite&action=deconnexion"?>">Deconnexion</a>    
    </nav>
    </header>

    




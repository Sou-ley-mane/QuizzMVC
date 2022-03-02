
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
<div>
    <table>
        <tr>
            <th>Nom</th>
            <th>Penom</th>
            <th>Score</th>
        </tr>
      <!-- PHP -->
      <?php foreach ($donnees as $valeur):?>
        <tr>
        <td><?= $valeur['nom']?></td>
        <td><?= $valeur['prenom']?></td>
        <td><?=$valeur['score']?></td>
        </tr>
        <?php endforeach ?>
    </table>

</div>
    




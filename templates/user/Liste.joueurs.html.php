<h3 id="score"><i>LISTE DES JOUEURS PAR SCORE</i></h3>

<div class="les_joueurs">

    <table>
       
        <tr>
            <th>Nom</th>
            <th>Penom</th>
            <th>Score</th>
        </tr>
      <!-- PHP -->
     
      <?php foreach ($items as $valeur):?>
       
        <!-- die($valeur); -->
        <tr>
        <td><?= $valeur['nom']?></td>
        <td><?= $valeur['prenom']?></td>
        <td><?=$valeur['score']?><span>pts</span></td>
        </tr>
        <?php endforeach ?>
    </table>

</div>
<div>
<?php if($page!=1):?>
<button class="pasi1"><a href="http://localhost:8003/?controleur=user&action=accueil&page=<?=$page-1;?>">Precédent</a></button>
<?php endif?>
<?php if($page<$totalPages):?>
<button class="pasi2"><a href="http://localhost:8003/?controleur=user&action=accueil&page=<?=$page+1;?>">suivant</a></button>
<?php endif?>

</div>

    




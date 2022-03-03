
<div class="les_joueurs">
    <h3><i>LISTE DES JOUEURS PAR SCORE</i></h3>
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
    




<h1 class="CreeQuizz">CRÉEZ ET PARAMETREZ VOS QUIZZ</h1>
<div class="question">
    <div class="label-inputs">
    <label for="">Questions</label>
    <input id="" type="text"> 
    </div>
    <div class="label " >
     <label class="nombre"  for="">Nbre de points</label>
    <input class="lab-input numero" type="number">
    </div>
    <div class="label-input">
    <label for="">Type de reponse</label>
    <select  name="" id="typeQestion"> 
        <!-- <option value="" disabled selected>Donner le type de question</option> -->
        <option value="1">Multiple</option>
        <option value="2" selected>simple</option>
        <option value="3">text</option>
    </select>
   <img class="ajout1" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-ajout-réponse.png"?>" alt="PROFIL" id="typeRep" >
    </div>
    <div id="reponseFinal">
        <!-- <div class="reponse" id="reponse">
            <input class="repText" type="text" id="repText">
            <input class="repCheck" type="checkbox" id="repCheck">
            <input  class="repRadio" type="radio" id="repRadio">
            <img class="ajout"   src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-supprimer.png"?>" alt="PROFIL" id="supprime">
        </div> -->
    </div>
    <!-- <div class="label-inputs">
    <label for="">Reponse 1</label>
    <input type="text">
    </div> -->


    <button id="Enregistrer">Enregistrer</button>

</div>

<script src="<?= DOSSIER_PUBLIC."js".DIRECTORY_SEPARATOR."question.js"?>"></script>

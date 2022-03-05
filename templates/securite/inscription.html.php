
<div id="utlisateurs">
    <div class="inscrire">

    <div class="title-form">
        <div class="title">
            <h1>S'INSCRIRE</h1>
            <h3>Pour tester votre niveau de culture générale</h3>
        </div>
        <form action="" class="form">
            <!-- Champ cachés -->
            <!-- Champ pour gerer le controleur -->
            <input type="hidden" name="controleur" value="securite">
            <!-- Champ pour gerer les actions -->
            <input type="hidden" name="action" value="connexion">
        <!-- Les erreurs en php -->
        <?php if (isset($errors['connexion'])):?>   
       <p style="color:red"> <?= $errors['connexion'] ?></p>
     <?php endif ?>
     <!-- *********************************************************** -->
     <div class="form-controle">
                <label for="utilisateur">Prenom</label>
                <input type="text" placeholder="votre prénom" id="prenom">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Message d'erreur</small>
            </div>
     <!-- *************************************************************** -->
     <div class="form-controle">
                <label for="utilisateur">Nom</label>
                <input type="text" placeholder="votre nom " id="nom">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Message d'erreur</small>
            </div>
     <!-- ***************************************************************** -->

                <div class="form-controle">
                    <label for="utilisateur">Login</label>
                    <input type="text" placeholder="votre email" id="email" name="login">
                    <!-- <i class="fa-solid fa-user"></i> -->
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Message d'erreur</small>
                    <!-- Validation php -->
                    <?php if (isset($errors['login'])):?> 
                        <p style="color:red"> <?= $errors['login'] ?></p>
                    <?php endif ?>
                </div>
                <!-- ******************************************************** -->

                <div class="form-controle">
                    <label for="utilisateur">Mot de passe</label>
                    <input type="password" placeholder="votre mot de passe" name="password" id="password">
                    <!-- <i class="fa-solid fa-lock"></i> -->
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Message d'erreur</small>
                    <!-- Validation php -->
                    <?php if (isset($errors['password'])){?>
                <p style="color:red"> <?=$errors['password']?></p>
                <?php } ?>
                </div>
                <!-- *************************************************** -->

                <div class="form-controle">
                <label for="utilisateur">Confirme mot de passe</label>
                <input type="password" placeholder="confirmer votre mot de passe" id="password2">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Message d'erreur</small>
            </div>

                <!-- ****************************************************************** -->
                <div class="fichier">
                <h3>Avatar</h3>
                <button type="submit" id="validation">Choisir un fichier</button>

                <!-- <input type="file" id=""value=" Choisir un fichier"> -->

                </div>
               
                <button type="submit" id="validation">Créer un compte</button>

                <!-- <input type="button"> -->

        </form>
    </div>


                <div class="identifiant">
                    <img class="logo-inscrit" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."jul.jpg"?>" alt="PROFIL">

                    <h3>SOULEYMANE DIALLO</h3>
                    </div>
            </div>


  </div>

  <script src="<?= DOSSIER_PUBLIC."js".DIRECTORY_SEPARATOR."inscription.js"?>"></script>


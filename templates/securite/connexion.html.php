    $errors[];
    <header>
        <h1>Le plaisir de jouer</h1>
    </header>
    <main>
    <div class="conteneur">
        <div class="header">
            <h2>Login form</h2>
        </div>
        <form action="<?= WEB_ROOT?>" class="form" id="form" method="POST">
        <!-- Champ cachés -->
        <!-- Champ pour gerer le controleur -->
        <input type="hidden" name="controleur" value="securite">
        <!-- Champ pour gerer les actions -->
        <input type="hidden" name="action" value="connexion">

            <div class="form-controle">
                <label for="utilisateur">Utilisateur</label>
                <input type="email" placeholder="votre email" id="email" name="login">
                <i class="fa-solid fa-user"></i>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Message d'erreur</small>
            </div>

            <div class="form-controle">
                <label for="utilisateur">Mot de passe</label>
                <input type="password" placeholder="votre mot de passe" name="password" id="password">
                <i class="fa-solid fa-lock"></i>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Message d'erreur</small>
            </div>

            <button type="submit" id="bouton">Connexion</button>

        </form>



   
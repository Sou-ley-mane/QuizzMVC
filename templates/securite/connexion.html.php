<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= DOSSIER_PUBLIC."css".DIRECTORY_SEPARATOR."style.connexion.css"?>">
    <script src="https://kit.fontawesome.com/2fcb5cccd1.js" defer crossorigin="anonymous"></script>

    <title>Validation</title>
</head>

<body>
    <header>
        <h1>Le plaisir de jouer</h1>
    </header>
    <main>
    <div class="conteneur">
        <div class="header">
            <h2>Login form</h2>
        </div>
        <form action="" class="form" id="form">
           

            <div class="form-controle">
                <label for="utilisateur">Utilisateur</label>
                <input type="email" placeholder="votre email" id="email">
                <i class="fa-solid fa-user"></i>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Message d'erreur</small>
            </div>

            <div class="form-controle">
                <label for="utilisateur">Mot de passe</label>
                <input type="password" placeholder="votre mot de passe" id="password">
                <i class="fa-solid fa-lock"></i>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Message d'erreur</small>
            </div>



  


            <button type="button" id="bouton">Connexion</button>

        </form>

    </div>
    <script src="<?= DOSSIER_PUBLIC."js".DIRECTORY_SEPARATOR."script.connexion.js"?>"></script>
    </main>
</body>

</html>
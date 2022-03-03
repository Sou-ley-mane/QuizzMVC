// LE DOM

const bouton = document.getElementById("bouton");
const password = document.getElementById("password");
const email = document.getElementById("email");



// Fonction pour recupérer les valeurs des champs
function recuperer() {
    // const valeurUser = user.value.trim()
    const valeurpassword = password.value.trim()
    const valeurEmail = email.value.trim()
        // const valeurpassword2 = password2.value.trim()
        // *************************************************************************
    if (valeurpassword === "") {
        afficheErreur(password, "Mot de passe est obligatoire")
    } else {
        afficheSucess(password)
    }
    // *******************************
    if (valeurEmail === "") {
        afficheErreur(email, "Veillez saisir votre email")
    } else if (valeurEmail != "") {
        ValidateEmail(email);
    } else {}
}

// *******************************LES FONCTIONS********************************************
function afficheErreur(input, message) {
    const formControl = input.parentElement;
    // const small = formControl.querySelector('small');
    const small = formControl.querySelector('small');
    // Affichage d'erreur avec small
    small.innerText = message;
    // La classe erreur
    formControl.className = 'form-controle error';
}

// Affiche succes
function afficheSucess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-controle succes';

}
// Fonction de validation de mail front
function ValidateEmail(inputText) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputText.value.match(mailformat)) {
        afficheSucess(email)
            // email.focus();
        return true;
    } else {
        afficheErreur(email, "le format de votre email est invalide")
            // email.focus();
        return false;
    }
}








// Evenement 
bouton.addEventListener('click', (e) => {
    // A vérifier sur le net
    e.preventDefault();

    recuperer();
});
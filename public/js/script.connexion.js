// LE DOM
const bouton = document.getElementById("bouton");
// const user = document.getElementById("user");
const password = document.getElementById("password");
const email = document.getElementById("email");
// const password2 = document.getElementById("password2");


// Fonction pour recupérer les valeurs des champs
function recuperer() {
    // const valeurUser = user.value.trim()
    const valeurpassword = password.value.trim()
    const valeurEmail = email.value.trim()
        // const valeurpassword2 = password2.value.trim()

    // alert("Hello")

    // if (valeurUser === "") {
    //     // Appel de la class erreur
    //     afficheErreur(user, "Veillez donner votre nom d'utilisateur")
    // } else {
    //     // Appel de la class succces
    //     afficheSucess(user)
    // }
    // *************************************************************************
    if (valeurpassword === "") {
        afficheErreur(password, "Mot de passe est obligatoire")

    } else {
        afficheSucess(password)


    }
    // *******************************
    // if (valeurpassword2 === "" || valeurpassword2 != valeurpassword) {
    //     afficheErreur(password2, "Confirmer votre mot de passe")
    // } else {
    //     afficheSucess(password2)
    // }

    // **********************A FAIRE*********
    if (valeurEmail === "") {
        afficheErreur(email, "Veillez saisir votre email")
    } else {
        afficheSucess(email)
    }


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
    formControl.className = '  form-controle succes';

}

// Evenement 
bouton.addEventListener('click', (e) => {
    // A vérifier sur le net
    e.preventDefault();

    recuperer();
});
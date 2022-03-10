const password = document.getElementById("password");
const email = document.getElementById("email");
const password2 = document.getElementById("password2");
const nom = document.getElementById("nom");
const prenom = document.getElementById("prenom");
const bouton2 = document.getElementById("validation");

// Fonction pour recupérer les valeurs des champs et valider les champ 
function recuperer() {
    var valid = true;
    // const valeurUser = user.value.trim()
    const valeurpassword = password.value.trim()
    const valeurEmail = email.value.trim()
    const valeurpassword2 = password2.value.trim()
    const valeurnom = nom.value.trim()
    const valeurPrenom = prenom.value.trim()
        // const valeurpassword2 = password2.value.trim()
        // *************************************************************************
    if (valeurpassword === "") {
        afficheErreur(password, "Veillez saisir votre password")
            // alert("non");
        valid = false;
    } else {
        valid = validMotPasse(password);
    }
    // ***************************************************************
    if (valeurpassword2 != "") {
        if (valeurpassword2 != valeurpassword) {
            afficheErreur(password2, "non identique au mot passe saisi")
            valid = false;

        } else {
            afficheSucess(password2);
            valid = true;
        }
    } else {
        afficheErreur(password2, "Veillez confirmer votre password")
        valid = false
    }
    // // *****************************************************
    if (valeurPrenom === "") {
        // Appel de la class erreur
        afficheErreur(prenom, "Veillez donner votre prenom ");
        valid = false;
    } else {
        // Appel de la class succces
        afficheSucess(prenom)
        valid = true;
    }
    // *******************************************************
    if (valeurnom === "") {
        // Appel de la class erreur
        afficheErreur(nom, "Veillez donner votre nom ")
        valid = false;
    } else {
        // Appel de la class succces
        afficheSucess(nom);

        valid = true;
    }
    // ***********************************************************
    if (valeurEmail === "") {
        afficheErreur(email, "Veillez saisir votre email")
        valid = false;
    } else {
        valid = ValidateEmail(email);
    }
    return valid;
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
    // return false;
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
        return true;
    } else {
        afficheErreur(email, "le format de votre email est invalide");
        // email.focus();
        return false;
    }
}

// Fonction pour valider le password
function validMotPasse(input) {
    var formPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
    if (input.value.match(formPassword)) {
        afficheSucess(password);
        return true;
    } else {
        afficheErreur(password, "password est invalide")
        return false;
    }
}
bouton2.addEventListener('click', (e) => {
    if (!recuperer()) {
        e.preventDefault();
    }
});


var loadFile = function(event) {
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
};
document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");

  form.addEventListener("submit", function (event) {
    var isValid = true;
    const champs = document.getElementById('champs');
    var champInvalid = []; // Initialise le tableau pour stocker les noms des champs invalides

    // Vérifie chaque champ du formulaire

    const email = document.getElementById('email');  
    const motdepasse = document.getElementById('MotDePasse');

    // Validation de l'email
    if (!validateEmail(email.value)) {
      isValid = false;
      champInvalid.push("Veuillez saisir une adresse email valide.");
      email.classList.add("border-red-500");
      email.classList.add("border-4");  // Ajoute une classe pour indiquer un champ invalide
    } else {
      email.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
    }

    // Validation du mot de passe
    if (
      motdepasse.value.length < 8 ||           // Modifié le sens de la condition
      !/[A-Z]/.test(motdepasse.value) ||    // Modifié le sens de la condition
      !/[a-z]/.test(motdepasse.value) ||    // Modifié le sens de la condition
      !/\d/.test(motdepasse.value) ||       // Modifié le sens de la condition
      !/\W/.test(motdepasse.value)          // Modifié le sens de la condition
    ){
      isValid = false;
      champInvalid.push("Le mot de passe doit respecter les critères de sécurité, comprenant au moins 8 caractères, une combinaison de lettres majuscules et minuscules, au moins un chiffre, et un caractère spécial.");
      motdepasse.classList.add("border-red-500");
      motdepasse.classList.add("border-4");  // Ajoute une classe pour indiquer un champ invalide
    } else {
      motdepasse.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
    }

    // Affiche les noms des champs invalides dans l'élément 'champs'
    champs.innerHTML = champInvalid.join(',<br> ');

    // Empêche l'envoi du formulaire si un champ est invalide
    if (!isValid) {
      const pop = document.getElementById('popup');
      pop.classList.remove("hidden");
      event.preventDefault();
    }
  });
});

// Fonction pour valider l'email
function validateEmail(email) {
  const re = /\S+@\S+\.\S+/;
  return re.test(email);
}

const valider = document.getElementById('valider');

valider.addEventListener('click', function () {
  const pop = document.getElementById('popup');
  pop.classList.add("hidden");
});

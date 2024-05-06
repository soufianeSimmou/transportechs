document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");
  const avatarInput = document.getElementById('urlImage');
  const avatarPreview = document.getElementById('urlImage-preview');

  avatarInput.addEventListener('change', () => {
    if (avatarInput.files && avatarInput.files[0]) {
      const reader = new FileReader();

      reader.onload = () => {
        avatarPreview.src = reader.result;
        avatarInput.dataset.avatarUrl = reader.result;
      };

      reader.readAsDataURL(avatarInput.files[0]);
    }
  });

  form.addEventListener("submit", function (event) {
    var isValid = true;
    const champs = document.getElementById('champs');
    var champInvalid = []; // Initialise le tableau pour stocker les noms des champs invalides

    // Vérifie chaque champ du formulaire

    const nom = document.getElementById('nom');
    const prenom = document.getElementById('prenom');
    const adresse = document.getElementById('adresse');
    const codepostal = document.getElementById('codepostal');
    const ville = document.getElementById('ville');
    const pays = document.getElementById('pays');
    const telephone = document.getElementById('telephone');
    const email = document.getElementById('email'); // Correction de la typo ici
    const fonction = document.getElementById('fonction');
    const dateembauche = document.getElementById('dateembauche');
    const salaire = document.getElementById('salaire');
    const motdepasse = document.getElementById('MotDePasse');


    // Vérifie si le champ est vide
    if (nom.value.trim() === "") {
      isValid = false;
      champInvalid.push(" le nom doit être rempli.");
      nom.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
      nom.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
    } else {
      // Vérifie la longueur du nom et s'il ne contient que des lettres
      if (nom.value.length < 2 || nom.value.length > 30 || !/^[a-zA-Z]+$/.test(nom.value)) {
        isValid = false;
        champInvalid.push(" Vérifie si la longueur du nom est entre 1 et 22 caractères et s'il ne contient que des lettres");
        nom.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
        nom.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
      } else {
        // Réinitialise les styles et les messages d'erreur pour les champs valides
        nom.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
      }
    }
    // Vérifie si le champ est vide
    if (prenom.value.trim() === "") {
      isValid = false;
      champInvalid.push("Le prenom doit être rempli.");
      prenom.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
      prenom.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
    } else {
      // Vérifie la longueur du nom et s'il ne contient que des lettres
      if (prenom.value.length < 2 || prenom.value.length > 30 || !/^[a-zA-Z]+$/.test(prenom.value)) {
        isValid = false;
        champInvalid.push("Le prenom doit avoir une longueur comprise entre 2 et 22 caractères et ne doit contenir aucun caractère spécial.");
        prenom.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
        prenom.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
      } else {
        // Réinitialise les styles et les messages d'erreur pour les champs valides
        prenom.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
      }
    }

    // Vérifie si le champ est vide
    if (adresse.value.trim() === "") {
      isValid = false;
      champInvalid.push("L'adresse doit être valide, conformément à la structure standard, sans caractères spéciaux inappropriés.");
      adresse.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
      adresse.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
    }
    else {
      // Réinitialise les styles et les messages d'erreur pour les champs valides
      adresse.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
    }

     // Vérifie si le champ est vide
     if (ville.value.trim() === "") {
      isValid = false;
      champInvalid.push(" la ville doit être valide, conformément à la structure standard, sans caractères spéciaux inappropriés.");
      ville.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
      ville.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
    }
    else {
      // Réinitialise les styles et les messages d'erreur pour les champs valides
      ville.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
    }

      // Vérifie si le champ est vide
      if (pays.value.trim() === "") {
        isValid = false;
        champInvalid.push(" le pays doit être rempli.");
        pays.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
        pays.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
      }
      else {
        // Réinitialise les styles et les messages d'erreur pour les champs valides
        pays.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
      } 
  // Vérifie si le champ est vide
  if (fonction.value.trim() === "") {
    isValid = false;
    champInvalid.push(" la fonction doit être rempli.");
    fonction.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
    fonction.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
  }
  else {
    // Réinitialise les styles et les messages d'erreur pour les champs valides
    fonction.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
  } 

         // Vérifie si le champ est vide
         if (dateembauche.value.trim() === "") {
          isValid = false;
          champInvalid.push(" la Date d'embauche doit être rempli.");
          dateembauche.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
          dateembauche.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
        }
        else {
          // Réinitialise les styles et les messages d'erreur pour les champs valides
          dateembauche.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
        } 
    // Vérifie si le champ est vide
    if (codepostal.value.trim() === "") {
      isValid = false;
      champInvalid.push("Le code postal doit être rempli.");
      codepostal.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
      codepostal.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
    }
    // Vérifie la validité du code postal
    else if (!/^\d+$/.test(codepostal.value)) {
      isValid = false;
      champInvalid.push("Le code postal ne doit contenir que des chiffres.");
      codepostal.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
      codepostal.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
    } else {
      // Réinitialise les styles et les messages d'erreur pour les champs valides
      codepostal.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
    }
  // Vérifie si le champ est vide
  if (salaire.value.trim() === "") {
    isValid = false;
    champInvalid.push("Le salaire doit être rempli.");
    salaire.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
    salaire.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
  }
  // Vérifie la validité du code postal
  else if (!/^\d+$/.test(salaire.value)) {
    isValid = false;
    champInvalid.push("Le salaire ne doit contenir que des chiffres.");
    salaire.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
    salaire.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
  } else {
    // Réinitialise les styles et les messages d'erreur pour les champs valides
    salaire.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
  }



    // Vérifie si le champ est vide
    if (telephone.value.trim() === "") {
      isValid = false;
      champInvalid.push("Le telephone doit être rempli.");
      telephone.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
      telephone.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
    }
    // Vérifie la validité du code postal
    else if (!/^\d+$/.test(telephone.value)) {
      isValid = false;
      champInvalid.push("Le telephone ne doit contenir que des chiffres.");
      telephone.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
      telephone.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
    } else {
      // Réinitialise les styles et les messages d'erreur pour les champs valides
      telephone.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
    }


  // Validation du mot de passe
    if (motdepasse.value.length < 8 || !/[A-Z]/.test(motdepasse.value) || !/[a-z]/.test(motdepasse.value) || !/\d/.test(motdepasse.value) || !/\W/.test(motdepasse.value)) {
      isValid = false;
      champInvalid.push("Le mot de passe doit respecter les critères de sécurité : au moins 8 caractères, une combinaison de lettres majuscules et minuscules, au moins un chiffre, et un caractère spécial.");
      motdepasse.classList.add("border-red-500"); // Ajoute une classe pour indiquer un champ invalide
      motdepasse.classList.add("border-4"); // Ajoute une classe pour indiquer un champ invalide
    } else {
      // Réinitialise les styles et les messages d'erreur pour les champs valides
      motdepasse.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
    }

    // Validation de l'e-mail
    if (!/\S+@\S+\.\S+/.test(email.value)) {
      isValid = false;
      champInvalid.push("Veuillez saisir une adresse email valide.");
      email.classList.add("border-red-500");
      email.classList.add("border-4");  // Ajoute une classe pour indiquer un champ invalide
    } else {
      email.classList.remove("border-red-500"); // Supprime la classe pour indiquer un champ valide
    }

    // Affiche les noms des champs invalides dans l'élément 'champs'
    champs.innerHTML = champInvalid.join(',<br> ');

    // Empêche l'envoi du formulaire si un champ est invalide
    if (!isValid) {
      var pop = document.getElementById('popup');
      pop.classList.remove("hidden");
      event.preventDefault();
    }
  });
});

var valider = document.getElementById('valider');

valider.addEventListener('click', function () {
  var pop = document.getElementById('popup');
  pop.classList.add("hidden");
});
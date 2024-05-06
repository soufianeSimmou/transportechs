
document.addEventListener("DOMContentLoaded", function() {
  const employer = document.getElementById('tableau_employe');
  const chauffeur = document.getElementById('tableau_chauffeur');
  const button_employer = document.getElementById('tableau_employe_button');
  const button_chauffeur = document.getElementById('tableau_chauffeur_button');

  button_chauffeur.addEventListener('click', function() {
    employer.classList.add('hidden');
    chauffeur.classList.remove('hidden');
  });

  button_employer.addEventListener('click', function() {
    chauffeur.classList.add('hidden');
    employer.classList.remove('hidden');
  });
});

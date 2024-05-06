<?php
ob_start();

include ("include/nav.php");
?>
<div class="w-full  flex flex-col justify-start items-center h-auto pb-44 bg-[#108ab1]">
  <div class="bg-[#108ab1] text-white p-4  text-center">
    <h2 class="mt-20 text-2xl italic font-black">INSCRIPTION GESTIONNAIRE</h2>
  </div>
  <div class="flex absolute flex-col h-full w-full justify-start items-end">
    <img src="./image/logo.jpg" alt="" class="w-[15rem] mt-24 mr-28 h-auto">
  </div>
  <div class="fixed hidden z-50 inset-0 flex justify-center items-center bg-gray-800 bg-opacity-70" id="popup">
    <div class="bg-white shadow-lg rounded-lg p-6">
      <div class="text-red-500 text-center text-2xl">Il semble qu'il y ait eu une erreur lors de votre inscription. <br>
        Veuillez vérifier tous les champs : <br>
        <div class="w-full mt-4 h-px bg-gray-500"> </div>
        <div class="text-xl mt-8" id="champs"><br></div>
      </div>
      <div class="flex items-center justify-center mt-14">
        <button
          class="inline-flex px-4 py-2 bg-green-500 font-bold text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
          id="valider">Valider</button>
      </div>
    </div>
  </div>

  <div
    class="w-1/3 mt-20 h-auto bg-[#efefef] flex flex-col items-center rounded-lg  bg-white border drop-shadow-xl  border-b border-gray-200">
    <form action="" id="formulaire" method="post" class="flex flex-col items-center justify-center min-h-screen p-10"
      enctype="multipart/form-data">

      <div class="mb-5 ">
        <label for="urlImage" class="block text-center mb-2 text-sm font-medium">profil (Max 5MB)</label>
        <div
          class="relative rounded-full border border-gray-300 p-2 w-[11.375rem] h-[11.375rem] flex justify-center items-center">
          <input type="file" name="urlImage" id="urlImage" accept="image/*"
            class="opacity-0 absolute cursor-pointer top-0 left-0 right-0 bottom-0 w-full h-full">
          <img id="urlImage-preview" class="rounded-full w-full h-full object-cover" src="./image/logo.jpg"
            alt="Preview">
        </div>
      </div>

      <div class="flex flex-col">
        <label for="Nom_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Nom</label>
        <input type="text"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Nom_chauffeur" name="Nomchauffeur">

        <div class="text-red-500 text-sm hidden" id="Nom_chauffeur-error">Le nom est invalide. Il doit contenir au moins
          2 lettres et ne doit pas contenir de chiffres.</div>
      </div>

      <div class="flex flex-col">
        <label for="Prénom_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Prénom</label>
        <input type="text"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Prénom_chauffeur" name="Prenomchauffeur">

        <div class="text-red-500 text-sm hidden" id="Prénom_chauffeur-error">Le prénom est invalide. Il doit contenir au
          moins 2 lettres et ne doit pas contenir de chiffres.</div>
      </div>

      <div class="flex flex-col">
        <label for="Adresse_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Adresse</label>
        <input type="Adresse_chauffeur"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Adresse_chauffeur" name="Adressechauffeur">
        <div class="text-red-500 text-sm hidden" id="Adresse_chauffeur-error">L'adresse est invalide. Veuillez saisir
          une adresse valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="Code_postal_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Code postal</label>
        <input type="text"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Code_postal_chauffeur" name="Codepostalchauffeur">
        <div class="text-red-500 text-sm hidden" id="Code_postal_chauffeur-error">Le code postal est invalide. Veuillez
          saisir un code postal valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="Ville_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Ville</label>
        <input type="text"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Ville_chauffeur" name="Villechauffeur">
        <div class="text-red-500 text-sm hidden" id="Ville_chauffeur-error">La ville est invalide. Veuillez saisir une
          ville valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="Pays_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Pays</label>
        <select class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Pays_chauffeur" name="Payschauffeur">
          <option value="">Sélectionnez un pays</option>
          <option value="France">France</option>
          <option value="Espagne">Espagne</option>
          <option value="Angleterre">Angleterre</option>
          <option value="Allemagne">Allemagne</option>
          <option value="Italie">Italie</option>
        </select>
        <div class="text-red-500 text-sm hidden" id="Pays_chauffeur-error">Le pays est invalide. Veuillez sélectionner
          un pays.</div>
      </div>

      <div class="flex flex-col">
        <label for="Téléphone_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Téléphone</label>
        <input type="tel"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Téléphone_chauffeur" name="Telephonechauffeur">
        <div class="text-red-500 text-sm hidden" id="Téléphone_chauffeur-error">Le numéro de téléphone est invalide.
          Veuillez saisir un numéro valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="Email_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Email</label>
        <input type="email"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Emailchauffeur" name="Emailchauffeur">
        <div class="text-red-500 text-sm hidden" id="Email_chauffeur-error">L'email est invalide. Veuillez saisir une
          adresse email valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="Numéro_permis" class="text-sm text-center text-[#108ab1] font-bold mb-2">Numéro de permis</label>
        <input type="text"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Numéro_permis" name="Numeropermis">
      </div>

      <div class="flex flex-col">
        <label for="Date_expiration_permis" class="text-sm text-center text-[#108ab1] font-bold mb-2">Date d'expiration
          du permis</label>
        <input type="date"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Date_expiration_permis" name="Dateexpirationpermis">
      </div>

      <div class="flex flex-col">
        <label for="MotDePasse" class="text-sm text-center text-[#108ab1] font-bold mb-2">Mot de passe</label>
        <input type="password"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="MotDePasse" name="MotDePasse">
        <div class="text-red-500 text-sm hidden" id="MotDePasse-error">Le mot de passe est invalide. Il doit contenir au
          moins 8 caractères.</div>
      </div>



      <button type="submit" name="submit"
        class="inline-flex mt-8 px-4 py-2 bg-[#108ab1] font-bold text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Envoyer</button>
    </form>
  </div>
</div>

<script src="./js/js_inscription.js"></script>
<?php
$content = ob_get_clean();
require_once ("./views/users/Template/layout.php");
?>
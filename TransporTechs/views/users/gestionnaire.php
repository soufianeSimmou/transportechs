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
      <div class="text-red-500 text-center text-2xl">Il semble qu'il y ait eu une erreur lors de votre inscription. <br>  Veuillez vérifier tous les champs : <br> <div class="w-full mt-4 h-px bg-gray-500"> </div> <div class="text-xl mt-8" id="champs"><br></div></div>
      <div class="flex items-center justify-center mt-14">
        <button class="inline-flex px-4 py-2 bg-green-500 font-bold text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" id="valider">Valider</button>
      </div>
    </div>
  </div>

  <div class="w-1/3 mt-20 h-auto bg-[#efefef] flex flex-col items-center rounded-lg  bg-white border drop-shadow-xl  border-b border-gray-200">
    <form action="" method="post" class="flex flex-col items-center justify-center min-h-screen p-10" enctype="multipart/form-data">

      <div class="mb-5 ">
        <label for="urlImage" class="block text-center mb-2 text-sm font-medium">profil (Max 5MB)</label>
        <div class="relative rounded-full border border-gray-300 p-2 w-[11.375rem] h-[11.375rem] flex justify-center items-center">
          <input type="file" name="urlImage" id="urlImage" accept="image/*" class="opacity-0 absolute cursor-pointer top-0 left-0 right-0 bottom-0 w-full h-full">
          <img id="urlImage-preview" class="rounded-full w-full h-full object-cover" src="./image/logo.jpg" alt="Preview">
        </div>
      </div>

      <div class="flex flex-col">
        <label for="nom" class="text-sm text-center text-[#108ab1] font-bold mb-2">Nom</label>
        <input type="text" class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="nom" name="nom">
        <div class="text-red-500 text-sm hidden" id="nom-error">Le nom est invalide. Il doit contenir au moins 2 lettres et ne doit pas contenir de chiffres.</div>
      </div>

      <div class="flex flex-col">
        <label for="prenom" class="text-sm text-center text-[#108ab1] font-bold mb-2">Prénom</label>
        <input type="text" class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="prenom" name="prenom">
        <div class="text-red-500 text-sm hidden" id="prenom-error">Le prénom est invalide. Il doit contenir au moins 2 lettres et ne doit pas contenir de chiffres.</div>
      </div>

      <div class="flex flex-col">
        <label for="email" class="text-sm text-center text-[#108ab1] font-bold mb-2">Email</label>
        <input type="email" class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="email" name="email">
        <div class="text-red-500 text-sm hidden" id="email-error">L'email est invalide. Veuillez saisir une adresse email valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="telephone" class="text-sm text-center text-[#108ab1] font-bold mb-2">Téléphone</label>
        <input type="tel" class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="telephone" name="telephone">
        <div class="text-red-500 text-sm hidden" id="telephone-error">Le numéro de téléphone est invalide. Veuillez saisir un numéro valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="adresse" class="text-sm text-center text-[#108ab1] font-bold mb-2">Adresse</label>
        <input type="text" class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="adresse" name="adresse">
        <div class="text-red-500 text-sm hidden" id="adresse-error">L'adresse est invalide. Veuillez saisir une adresse valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="codepostal" class="text-sm text-center text-[#108ab1] font-bold mb-2">Code postal</label>
        <input type="text" class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="codepostal" name="codepostal">
        <div class="text-red-500 text-sm hidden" id="codepostal-error">Le code postal est invalide. Veuillez saisir un code postal valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="ville" class="text-sm text-center text-[#108ab1] font-bold mb-2">Ville</label>
        <input type="text" class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="ville" name="ville">
        <div class="text-red-500 text-sm hidden" id="ville-error">La ville est invalide. Veuillez saisir une ville valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="pays" class="text-sm text-center text-[#108ab1] font-bold mb-2">Pays</label>
        <select class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="pays" name="pays">
          <option value="">Sélectionnez un pays</option>
          <option value="France">France</option>
          <option value="Espagne">Espagne</option>
          <option value="Angleterre">Angleterre</option>
          <option value="Allemagne">Allemagne</option>
          <option value="Italie">Italie</option>
        </select>
        <div class="text-red-500 text-sm hidden" id="pays-error">Le pays est invalide. Veuillez sélectionner un pays.</div>
      </div>

      <div class="flex flex-col">
        <label for="fonction" class="text-sm text-center text-[#108ab1] font-bold mb-2">Fonction</label>
        <select class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="fonction" name="fonction">
          <option value="">Sélectionnez votre fonction</option>
          <option value="Ressource humaine">Ressource humaine</option>
          <option value="ouvrier">ouvrier</option>
          <option value="interimaire">interimaire</option>
          <option value="responsable">responsable</option>
          <option value="gestionnaire">Gestionnaire de transport</option>
        </select>
        <div class="text-red-500 text-sm hidden" id="fonction-error">La fonction est invalide. Veuillez sélectionner une fonction.</div>
      </div>

      <div class="flex flex-col">
        <label for="dateembauche" class="text-sm text-center text-[#108ab1] font-bold mb-2">Date d'embauche</label>
        <input type="date" class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="dateembauche" name="dateembauche">
        <div class="text-red-500 text-sm hidden" id="dateembauche-error">La date d'embauche est invalide. Veuillez sélectionner une date valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="salaire" class="text-sm text-center text-[#108ab1] font-bold mb-2">Salaire</label>
        <input type="number" class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="salaire" name="salaire">
        <div class="text-red-500 text-sm hidden" id="salaire-error">Le salaire est invalide. Veuillez saisir un montant valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="MotDePasse" class="text-sm text-center text-[#108ab1] font-bold mb-2">Mot de passe</label>
        <input type="password" class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" id="MotDePasse" name="MotDePasse">
        <div class="text-red-500 text-sm hidden" id="MotDePasse-error">Le mot de passe est invalide. Il doit contenir au moins 8 caractères.</div>
      </div>

      <button type="submit" name="submit" class="inline-flex mt-8 px-4 py-2 bg-[#108ab1] font-bold text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Envoyer</button>
    </form>
  </div>
</div>

<script src="./js/js_inscriptionEmploye.js"></script>
<?php
$content = ob_get_clean();
require_once ("./views/users/Template/layout.php");
?>

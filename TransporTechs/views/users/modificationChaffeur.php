<?php
ob_start();

include ("include/nav.php");
?>
<div class="w-full h-screen  flex flex-col justify-center items-center bg-[#108ab1] ">
    <div class="flex flex-col justify-center items-center">
        <img src="./image/logo.jpg" alt="" class="w-[15rem] mt-24 h-auto">
        <h1 class="text-3xl italic font-black drop-shadow-xl text-white mt-8">MODIFIER LES INFORMATIONS DU PERSONNEL
        </h1>
    </div>
    <div
        class="w-4/5 mb-24 mt-20 h-auto bg-[#efefef] flex flex-col items-center rounded-lg bg-white border drop-shadow-xl border-b border-gray-200">
        <form action="" method="post" class="grid grid-cols-4 gap-4 p-10 " enctype="multipart/form-data">
        <div class="col-span-4 mb-5  flex flex-col items-center">
                <label for="urlImage" class="block text-center mb-2 text-sm font-medium">Profil (Max 5MB)</label>
                <div
                    class=" relative rounded-full border border-gray-300 p-2 w-[11.375rem] h-[11.375rem] flex justify-center items-center">
                    <input type="file" name="urlImage" id="urlImage" accept="image/*"
                        class="opacity-0 absolute cursor-pointer top-0 left-0 right-0 bottom-0 w-full h-full">
                    <img id="urlImage-preview" class="rounded-full w-full h-full object-cover"
                        src="<?= ($users["urlImage"] == "image/") ? "./image/navlogo.jpg" : "./" . $users["urlImage"]; ?>"
                        alt="Preview">
                </div>
            </div>

      <div class="flex flex-col">
        <label for="Nom_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Nom</label>
        <input type="text"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Nom_chauffeur" name="Nomchauffeur" value="<?= $users["Nomchauffeur"] ?>">

        <div class="text-red-500 text-sm hidden" id="Nom_chauffeur-error">Le nom est invalide. Il doit contenir au moins
          2 lettres et ne doit pas contenir de chiffres.</div>
      </div>

      <div class="flex flex-col">
        <label for="Prénom_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Prénom</label>
        <input type="text"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Prénom_chauffeur" name="Prenomchauffeur"value="<?= $users["Prenomchauffeur"] ?>">

        <div class="text-red-500 text-sm hidden" id="Prénom_chauffeur-error">Le prénom est invalide. Il doit contenir au
          moins 2 lettres et ne doit pas contenir de chiffres.</div>
      </div>

      <div class="flex flex-col">
        <label for="Adresse_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Adresse</label>
        <input type="Adresse_chauffeur"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Adresse_chauffeur" name="Adressechauffeur" value="<?= $users["Adressechauffeur"] ?>">
        <div class="text-red-500 text-sm hidden" id="Adresse_chauffeur-error">L'adresse est invalide. Veuillez saisir
          une adresse valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="Code_postal_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Code postal</label>
        <input type="text"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Code_postal_chauffeur" name="Codepostalchauffeur"  value="<?= $users["Codepostalchauffeur"] ?>">
        <div class="text-red-500 text-sm hidden" id="Code_postal_chauffeur-error">Le code postal est invalide. Veuillez
          saisir un code postal valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="Ville_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Ville</label>
        <input type="text"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Ville_chauffeur" name="Villechauffeur" value="<?= $users["Villechauffeur"] ?>">
        <div class="text-red-500 text-sm hidden" id="Ville_chauffeur-error">La ville est invalide. Veuillez saisir une
          ville valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="Pays_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Pays</label>
        <select class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Pays_chauffeur" name="Payschauffeur" >
          <option value="">Sélectionnez un pays</option>
          <option value="France" <?php if ($users["Payschauffeur"] == "France") echo "selected"; ?>>France</option>
        <option value="Espagne" <?php if ($users["Payschauffeur"] == "Espagne") echo "selected"; ?>>Espagne</option>
        <option value="Angleterre" <?php if ($users["Payschauffeur"] == "Angleterre") echo "selected"; ?>>Angleterre</option>
        <option value="Allemagne" <?php if ($users["Payschauffeur"] == "Allemagne") echo "selected"; ?>>Allemagne</option>
        <option value="Italie" <?php if ($users["Payschauffeur"] == "Italie") echo "selected"; ?>>Italie</option>
        </select>
        <div class="text-red-500 text-sm hidden" id="Pays_chauffeur-error">Le pays est invalide. Veuillez sélectionner
          un pays.</div>
      </div>

      <div class="flex flex-col">
        <label for="Téléphone_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Téléphone</label>
        <input type="tel"  value="<?= $users["Telephonechauffeur"] ?>"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Téléphone_chauffeur" name="Telephonechauffeur">
        <div class="text-red-500 text-sm hidden" id="Téléphone_chauffeur-error">Le numéro de téléphone est invalide.
          Veuillez saisir un numéro valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="Email_chauffeur" class="text-sm text-center text-[#108ab1] font-bold mb-2">Email</label>
        <input type="email"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Emailchauffeur" name="Emailchauffeur"  value="<?= $users["Emailchauffeur"] ?>">
        <div class="text-red-500 text-sm hidden" id="Email_chauffeur-error">L'email est invalide. Veuillez saisir une
          adresse email valide.</div>
      </div>

      <div class="flex flex-col">
        <label for="Numéro_permis" class="text-sm text-center text-[#108ab1] font-bold mb-2">Numéro de permis</label>
        <input type="text" value="<?= $users["Numeropermis"] ?>"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Numéro_permis" name="Numeropermis">
      </div>

      <div class="flex flex-col">
        <label for="Date_expiration_permis" class="text-sm text-center text-[#108ab1] font-bold mb-2">Date d'expiration
          du permis</label>
        <input type="date" value="<?= $users["Dateexpirationpermis"] ?>"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="Date_expiration_permis" name="Dateexpirationpermis">
      </div>


            <div class="col-span-4 flex flex-col">
                <button type="submit" name="submit"
                    class="px-4 py-2 bg-[#108ab1] font-bold text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Envoyer</button>
            </div>
        </form>
    </div>

</div>

</div>
<script src="./js/js_inscription.js"></script>
<?php
$content = ob_get_clean();

require_once ("./views/users/Template/layout.php");

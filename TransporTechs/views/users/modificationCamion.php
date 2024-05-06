<?php
ob_start();

include ("include/nav.php");
?>
<div class="w-full h-screen mb-44 flex flex-col justify-center items-center bg-[#108ab1] ">
  <div class="flex flex-col justify-center items-center">
    <img src="./image/logo.jpg" alt="" class="w-[15rem] mt-24 h-auto">
    <h1 class="text-3xl italic font-black drop-shadow-xl text-white mt-8">MODIFIER LES INFORMATIONS DU CAMION
    </h1>
  </div>

  <div class="mb-5 mt-20 text-center">
    <h class="text-xl italic font-black mb-4 drop-shadow-xl text-white mt-2">
      <?= $info["MarqueCamion"] ?>
    </h>
    <div
      class="relative rounded-lg border border-gray-300 p-2 w-[35.375rem] h-[20.375rem]  flex justify-center items-center">

      <div type="file" name="urlImage" id="urlImage" accept="image/*"
        class="opacity-0 absolute  top-0 left-0 right-0 bottom-0 w-full h-full"></div>
      <img id="urlImage-preview" class="rounded-lg w-full h-full object-cover" src="<?= $info["urlCamion"] ?>"
        alt="Preview">
    </div>
  </div>
  <h class="text-xl italic font-black drop-shadow-xl text-white mt-8">immatriculation
  </h>
  <h class="text-xl italic font-black drop-shadow-xl text-white mt-2">
    <?= $info["ImmatriculationCamion"] ?>
  </h>
  <div class="bg-white rounded-lg  mt-[3rem]">
    <form action="" method="post" class="p-4 md:p-5">
      <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">



          <label for="poids" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poids du
            camion
            (en
            kg)</label>
          <input type="number" name="poids" id="poids" value="<?= $info["PoidsCamion"] ?>"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="Poids du camion">
          <label for="idChauffeur"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chauffeur</label>
          <select id="idChauffeur" name="idChauffeur"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <?php foreach ($chauffeurs as $chauffeur): ?>
    <?php if ($chauffeur['IDchauffeur'] == $info["IDchauffeur"]): ?>
        <option value="<?= $chauffeur['IDchauffeur']; ?>" <?= ($chauffeur['IDchauffeur'] == $info["IDchauffeur"]) ? 'selected' : ''; ?>>
            <?= $chauffeur['Nomchauffeur'] . ' ' . $chauffeur['Prenomchauffeur'] . '  (Numero de permis :' . $chauffeur['Numeropermis'] . ')'; ?>
        </option>
       
    <?php endif; ?>
<?php endforeach; ?>
            <?php foreach ($chauffeurs as $chauffeur): ?>
    <?php if ($chauffeur['statut'] == 'aucun camion a disposition'): ?>
        <option value="<?= $chauffeur['IDchauffeur']; ?>" <?= ($chauffeur['IDchauffeur'] == $info["IDchauffeur"]) ? 'selected' : ''; ?>>
            <?= $chauffeur['Nomchauffeur'] . ' ' . $chauffeur['Prenomchauffeur'] . '  (Numero de permis :' . $chauffeur['Numeropermis'] . ')'; ?>
        </option>
    <?php endif; ?>
<?php endforeach; ?>


          </select>


        </div>
      </div>
      <button type="submit" name="modifierCamion"
        class="inline-flex mt-8 px-4 py-2 bg-blue-500 border border-blue-700 font-bold text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Envoyer</button>

    </form>
  </div>
</div>

</div>
<script src="./js/js_inscription.js"></script>
<?php
$content = ob_get_clean();

require_once ("./views/users/Template/layout.php");

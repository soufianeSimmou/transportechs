<?php
ob_start();

include ("include/nav.php");
?>
<div class="w-full h-screen bg-[#108ab1] ">
    <div class="flex flex-col justify-center items-center">
        <img src="./image/logo.jpg" alt="" class="w-[15rem] mt-24 h-auto">
        <h1 class="text-3xl italic font-black drop-shadow-xl text-white mt-8">GESTION DE PERSONNEL
        </h1> 
        <a href="inscription" class="text-white px-8 py-4 bg-[#108ab1] border-gray-200 border mt-8 rounded-xl">AJOUTER UN PERSONNEL</a>
        <div class="flex justify-center items-center ">
    <button  class="text-white px-8 py-4 bg-[#108ab1] border-gray-200 border mt-8 rounded-xl" id="tableau_employe_button">AFFICHER LE TABLEAU DES EMPLOYEES</button>
    <button class="text-white px-8 py-4 bg-[#108ab1] border-gray-200 border mt-8 rounded-xl ml-4"id="tableau_chauffeur_button">AFFICHER LE TABLEAU DES CHAUFFEURS</button>
</div>

        <div class="flex-col justify-center items-center mt-20 ">
       
        <table class="mx-24 rounded-xl drop-shadow-xl  " id="tableau_employe">

  <thead class="">
    <tr class=" bg-white text-sm">
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900 p-8">Profil</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">ID</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Nom</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Prénom</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Adresse</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Code Postal</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Ville</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Pays</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Téléphone</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Email</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Date d'embauche</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Salaire</th>
      <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Modification</th>
      <th class="text-center px-4 py-2  text-red-400 italic font-black drop-shadow-xl hover:text-gray-900">supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
      <tr class="text-center px-4 py-2 italic font-medium space-x-8 text-sm drop-shadow-xl space-y-4  bg-white">
        <td class="flex justify-center  items-center">
          <div class="h-16 w-16 rounded-full  overflow-hidden">
            <img src="<?php echo ($user->geturlImage() == "image/") ? "./image/navlogo.jpg" : "./" . $user->geturlImage(); ?>" alt="" class="h-full w-full object-cover">
          </div>
        </td>
        <td><?php echo $user->getId(); ?></td>
        <td><?php echo $user->getNom(); ?></td>
        <td><?php echo $user->getPrenom(); ?></td>
        <td><?php echo $user->getAdresse(); ?></td>
        <td><?php echo $user->getCodePostal(); ?></td>
        <td><?php echo $user->getVille(); ?></td>
        <td><?php echo $user->getPays(); ?></td>
        <td><?php echo $user->getTelephone(); ?></td>
        <td><?php echo $user->getEmail(); ?></td>
        <td><?php echo $user->getDateEmbauche(); ?></td>
        <td><?php echo $user->getSalaire(); ?></td>
        <td> <a href="modification?id=<?= $user->getId(); ?>" class="text-white px-8 py-4 bg-[#108ab1] rounded-xl">Modifier</a></td>
        <td><a href="supprimer?id=<?= $user->getId(); ?>" class="text-white px-8 py-4  bg-red-400 rounded-xl">supprimer</a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<table class="mx-24 rounded-xl drop-shadow-xl hidden "id="tableau_chauffeur">

<thead class="">
  <tr class=" bg-white text-sm">
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900 p-8">Profil</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">ID chauffeur</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Nom chauffeur</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Prenom chauffeur</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Adresse chauffeur</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Code postal chauffeur</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Ville chauffeur</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Pays chauffeur</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Telephone chauffeur</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Email chauffeur</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Numeropermis</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Date expiration permis</th>
    <th class="text-center px-4 py-2  text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">Modification</th>
      <th class="text-center px-4 py-2  text-red-400 italic font-black drop-shadow-xl hover:text-gray-900">supprimer</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($chauffeurs as $user): ?>
    <tr class="text-center px-4 py-2 italic font-medium space-x-8 text-sm drop-shadow-xl space-y-4  bg-white">
      <td class="flex justify-center  items-center">
        <div class="h-16 w-16 rounded-full  overflow-hidden">
          <img src="<?php echo ($user->getUrlImage() == "image/") ? "./image/navlogo.jpg" : "./" . $user->getUrlImage(); ?>" alt="" class="h-full w-full object-cover">
        </div>
      </td>
      <td><?php echo $user->getIdChauffeur(); ?></td>
      <td><?php echo $user->getNomChauffeur(); ?></td>
      <td><?php echo $user->getPrenomChauffeur(); ?></td>
      <td><?php echo $user->getAdresseChauffeur(); ?></td>
      <td><?php echo $user->getCodePostalChauffeur(); ?></td>
      <td><?php echo $user->getVilleChauffeur(); ?></td>
      <td><?php echo $user->getPaysChauffeur(); ?></td>
      <td><?php echo $user->getTelephoneChauffeur(); ?></td>
      <td><?php echo $user->getEmailChauffeur(); ?></td>
      <td><?php echo $user->getNumeroPermis(); ?></td>
      <td><?php echo $user->getDateExpirationPermis(); ?></td>
      <td> <a href="modificationChauffeur?id=<?= $user->getIdChauffeur(); ?>" class="text-white px-8 py-4 bg-[#108ab1] rounded-xl">Modifier</a></td>

      <td><a href="supprimerC?id=<?= $user->getIdChauffeur(); ?>" class="text-white px-8 py-4  bg-red-400 rounded-xl">supprimer</a></td>
    </tr>
  <?php endforeach; ?>
</tbody>
</table>



        </div>
    </div>


</div>
<script src="./js/gestionPersonnel.js"></script>
<?php

$content = ob_get_clean();
require_once ("./views/users/Template/layout.php");

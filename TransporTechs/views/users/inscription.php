<?php
ob_start();

include ("include/nav.php");
?>
<div class="w-full  flex flex-col justify-start items-center h-auto pb-44 bg-[#108ab1]">
  <div class="bg-[#108ab1] text-white p-4  text-center">
    <h2 class="mt-20 text-2xl italic font-black">INSCRIPTION EMPLOYE</h2>
    <h3 class="mt-20 text-2xl italic font-black">CHOISSISEZ VOTRE CORP DE METIER</h3>
  </div>
  <div class="flex absolute flex-col h-full w-full justify-start items-end">
    <img src="./image/logo.jpg" alt="" class="w-[15rem] mt-24 mr-28 h-auto">
  </div>
  <div class="flex justify-center mt-24 items-center">

    <div class="bg-white rounded-lg me-14 shadow-md overflow-hidden">
      <img src="./image/livraison.jpg" alt="Image de la carte" class="w-full h-48 object-cover">
      <div class="p-4">
        <h5 class="text-xl font-bold tracking-tight text-gray-900">CHAUFFEUR </h5>
       
        <a href="/TransporTechs/chauffeur"
          class="inline-flex items-center px-4 py-2 bg-primary italic font-black drop-shadow-xl mt-4  text-white border bg-[#108ab1] font-bold rounded-lg">
          Démarrer
        </a>
      </div>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="./image/PERSONNEL.jpg" alt="Image de la carte" class="w-full h-48 object-cover">
      <div class="p-4">
        <h5 class="text-xl font-bold tracking-tight text-gray-900">EMPLOYE</h5>
       
        <a href="/TransporTechs/gestionnaire"
          class="inline-flex items-center px-4 py-2 bg-primary italic font-black drop-shadow-xl mt-4  text-white border bg-[#108ab1] font-bold rounded-lg">
          Démarrer
        </a>
      </div>
    </div>

  </div>
  <?php
  $content = ob_get_clean();
  require_once ("./views/users/Template/layout.php");
  ?>
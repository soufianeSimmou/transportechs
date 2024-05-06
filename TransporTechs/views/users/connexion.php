<?php
ob_start();
include ("include/nav.php");
?>
<div class="w-full flex flex-col justify-start items-center h-auto pb-44 bg-[#108ab1]">
  <div class="bg-[#108ab1] text-white p-4 text-center">
    <h2 class="mt-20 text-2xl italic font-black	">CONNEXION EMPLOYE</h2>
  </div>
  <div class="flex absolute flex-col h-full w-full justify-start items-end"> <img src="./image/logo.jpg" alt=""
      class="w-[15rem] mt-24 mr-28 h-auto">
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
    class="w-1/3 pb-8 mt-20 h-auto bg-[#efefef] flex flex-col items-center rounded-lg bg-white border drop-shadow-xl border-b border-gray-200">

    <form action="" method="post" id="formulaire" class="space-y-4">
      <div class="flex flex-col items-center space-y-4 mt-8">
        <label for="email" class=" text-xl text-center text-[#108ab1] font-bold mb-2">Email de l'utilisateur</label>
        <input type="text"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="email" name="email" required>

        <label for="MotDePasse" class=" text-xl text-center text-[#108ab1] font-bold mb-2">Mot de passe</label>
        <input type="password"
          class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
          id="MotDePasse" name="MotDePasse" required>
        <a href="/TransporTechs/inscription" class="text-[#108ab1] font-bold ">vous n'avez pas de compte ?</a>
        <button type="submit" name="submit"
          class="inline-flex px-4 py-2 bg-[#108ab1] font-bold text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          Se connecter
        </button>
      </div>
    </form>


  </div>
</div>
<script src="./js/js_connexion.js"></script>
<?php
$content = ob_get_clean();
require_once ("./views/users/Template/layout.php");

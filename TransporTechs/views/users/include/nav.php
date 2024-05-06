<?php
// Déterminez la page actuelle
$currentPage = 'accueil'; // Par défaut, vous êtes sur la page d'accueil
if (strpos($_SERVER['REQUEST_URI'], '/TransporTechs/inscription') !== false) {
  $currentPage = 'inscription';
} elseif (strpos($_SERVER['REQUEST_URI'], '/TransporTechs/connexion') !== false) {
  $currentPage = 'connexion';
} 
elseif(isset($_SESSION["id"])){
  $currentPage = '';
}

?>
<nav class="bg-[#efefef] drop-shadow-xl  border-b border-gray-200">
  <div class="container mx-auto flex flex-wrap items-center justify-between py-4">
  
  <div class="flex items-center">
    <?php if (isset($_SESSION["id"])): ?>
        <div class="h-[4rem] w-[4rem] rounded-full overflow-hidden">
        <img src="<?php echo ($_SESSION["url"] == "image/") ? "./image/navlogo.jpg" : "./" . $_SESSION["url"]; ?>" alt="" class="h-full w-full object-cover">

        </div>
        <div class="ms-8 text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900"><?= $_SESSION["nom"] ?> <?= $_SESSION["prenom"] ?></div>
    <?php endif; ?>



    <a href="/" class="mr-4">

      <img src="./image/whitelogonav.jpg" alt="Logo" class="h-14 w-auto">
    </a>
  </div>
  <div class="flex items-center space-x-4">

    <?php if ($currentPage === 'inscription' && !isset($_SESSION["id"])): ?>
      <a href="/TransporTechs/connexion"
        class="text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">CONNEXION</a>
    <?php elseif ($currentPage === 'connexion'): ?>
      <a href="/TransporTechs/inscription"
        class="text-[#108ab1] italic font-black  drop-shadow-xl hover:text-gray-900">INSCRIPTION</a>
    <?php elseif (isset($_SESSION["id"])): ?>
      <a href="/TransporTechs/GestionAccueil"
        class="text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">ACCUEIL</a>
        <a href="/TransporTechs/GestionPersonnel"
        class="text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">PERSONNEL</a>
        <a href="/TransporTechs/GestionCamion"
        class="text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">CAMION</a>
        <a href="/TransporTechs/destroy"
        class="text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">CONTRAT</a>
        <a href="/TransporTechs/destroy"
        class="text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">DEPOT</a>
        <a href="/TransporTechs/destroy"
        class="text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">LIVRAISON</a>
        <a href="/TransporTechs/destroy"
        class="text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">PROFIL</a>
        
      <a href="/TransporTechs/destroy"
        class="text-[#108ab1] italic font-black drop-shadow-xl hover:text-gray-900">DECONNEXION</a>
    <?php elseif ($currentPage === 'accueil'): ?>
      <a href="/TransporTechs/connexion"
        class="text-[#108ab1] italic font-black  drop-shadow-xl hover:text-gray-900">CONNEXION</a>

    <?php endif; ?>
  </div>
  </div>
</nav>
<?php
    ob_start();
   
    include ("include/nav.php");
    ?>
    <div class="w-full h-screen bg-[#108ab1] ">
        <div class="flex flex-col justify-center items-center">
            <img src="./image/logo.jpg" alt="" class="w-[15rem] mt-24 h-auto">
            <h1 class="text-3xl italic font-black drop-shadow-xl text-white mt-8">GESTION DE TRANSPORT ET DE LOGISTIQUE
            </h1>
        </div>

        <div class="grid grid-cols-3 gap-4 mt-16 mx-20 pb-[10rem]">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="./image/PERSONNEL.jpg" alt="Image de la carte" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900">GESTION DE PERSONNEL </h5>
                    <p class="text-gray-700">Gerer les personnel des depots ect...</p>
                    <a href="/TransporTechs/GestionPersonnel"
                        class="inline-flex items-center px-4 py-2 bg-primary italic font-black drop-shadow-xl mt-4  text-white border bg-[#108ab1] font-bold rounded-lg">
                        Démarrer
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="./image/camion.jpg" alt="Image de la carte" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900">GESTION DE CAMION </h5>
                    <p class="text-gray-700">Description de la carte.</p>
                    <a href="/TransporTechs/GestionCamion"
                        class="inline-flex items-center px-4 py-2 bg-primary italic font-black drop-shadow-xl mt-4  text-white border bg-[#108ab1] font-bold rounded-lg">
                        Démarrer
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="./image/client.png" alt="Image de la carte" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900">GESTION DE CONTRAT DE LIVRAISON </h5>
                    <p class="text-gray-700">Description de la carte.</p>
                    <a href="#"
                        class="inline-flex items-center px-4 py-2 bg-primary italic font-black drop-shadow-xl mt-4  text-white border bg-[#108ab1] font-bold rounded-lg">
                        Démarrer
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="./image/depot.jpg" alt="Image de la carte" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900">GESTION DE DEPOT </h5>
                    <p class="text-gray-700">Description de la carte.</p>
                    <a href="#"
                        class="inline-flex items-center px-4 py-2 bg-primary italic font-black drop-shadow-xl mt-4  text-white border bg-[#108ab1] font-bold rounded-lg">
                        Démarrer
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="./image/livraison.jpg" alt="Image de la carte" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900">GESTION DE LIVRAISON </h5>
                    <p class="text-gray-700">Description de la carte.</p>
                    <a href="#"
                        class="inline-flex items-center px-4 py-2 bg-primary italic font-black drop-shadow-xl mt-4  text-white border bg-[#108ab1] font-bold rounded-lg">
                        Démarrer
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="./image/whitelogo.jpg" alt="Image de la carte" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900"> TON PROFIL</h5>
                    <p class="text-gray-700">Description de la carte.</p>
                    <a href="#"
                        class="inline-flex items-center px-4 py-2 bg-primary italic font-black drop-shadow-xl mt-4  text-white border bg-[#108ab1] font-bold rounded-lg">
                        Démarrer
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
   $content = ob_get_clean();
   require_once("./views/users/Template/layout.php");

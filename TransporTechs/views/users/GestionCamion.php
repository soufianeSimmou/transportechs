<?php
ob_start();

include ("include/nav.php");
?>
<div class="w-full h-screen bg-[#108ab1] ">
    <div class="flex flex-col justify-center items-center">
        <!-- Modal toggle -->


        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            AJOUTER UN NOUVEAU CAMION </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="" method="post" class="p-4 md:p-5" enctype="multipart/form-data">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">

                                <label for="immatriculation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Immatriculation
                                    du camion</label>
                                <input type="text" name="immatriculation" id="immatriculation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Immatriculation du camion">

                                <label for="immatriculation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marque
                                    <select id="marque" name="marque"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="">Sélectionnez la marque du camion</option>
                                        <option value="IVECO">IVECO</option>
                                        <option value="SCANIA">SCANIA</option>
                                        <option value="VOLVO">Volvo</option>
                                        <option value="MERCEDES-BENZ">Mercedes-Benz</option>
                                        <option value="DAF">DAF</option>
                                        <option value="RENAULT">Renault</option>
                                        <option value="MAN">MAN</option>

                                    </select>
                                    <label for="poids"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poids du
                                        camion
                                        (en
                                        kg)</label>
                                    <input type="number" name="poids" id="poids"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Poids du camion">
                                    <label for="idChauffeur"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chauffeur</label>
                                    <select id="idChauffeur" name="idChauffeur"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="">Sélectionnez un chauffeur disponible </option>
                                        <?php foreach ($chauffeurs as $chauffeur): ?>
                                            <?php if ($chauffeur['statut'] == 'aucun camion a disposition'): ?>
                                                <option value="<?= $chauffeur['IDchauffeur']; ?>"
                                                    <?= ($chauffeur['IDchauffeur']) ? 'selected' : ''; ?>>
                                                    <?= $chauffeur['Nomchauffeur'] . ' ' . $chauffeur['Prenomchauffeur'] . '  (Numero de permis :' . $chauffeur['Numeropermis'] . ')'; ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>

                            </div>
                        </div>
                        <button type="submit" name="ajouteCamion"
                            class="inline-flex mt-8 px-4 py-2 bg-[#108ab1] font-bold text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Envoyer</button>

                    </form>

                </div>
            </div>
        </div>
        <img src="./image/logo.jpg" alt="" class="w-[15rem] mt-24 h-auto">
        <h1 class="text-3xl italic font-black drop-shadow-xl text-white mt-8">GESTION DE CAMION
        </h1>
        <button href="inscription" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="text-white px-8 py-4 bg-[#108ab1] border-gray-200 border mt-8 rounded-xl">AJOUTER UN
            CAMION</button>
        <div class="flex justify-center items-center ">
        </div>

        <div class="flex-col justify-center items-center mt-20 ">
            <?php if (empty($camionvalue)): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="./image/livraison.jpg" alt="Image de la carte" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h5 class="text-xl font-bold tracking-tight text-gray-900">AUCUN CAMION</h5>
                        <a href="/TransporTechs/gestionnaire"
                            class="inline-flex items-center px-4 py-2 bg-primary italic font-black drop-shadow-xl mt-4  text-white border bg-gray-500 font-bold rounded-lg">
                            modifier
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-4 gap-8">

                    <?php foreach ($camionvalue as $camion): ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="<?php echo ($camion->geturlCamion() == "image/") ? "./image/livraison.jpg" : "./" . $camion->geturlCamion(); ?>"
                                alt="Image de la carte" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h5 class="text-xl font-bold tracking-tight text-gray-900">Marque :
                                    <?php echo $camion->getMarqueCamion(); ?>
                                </h5>
                                <h5 class="text-xl font-bold tracking-tight text-gray-900">immatriculation :
                                    <?php echo $camion->getImmatriculationCamion(); ?>
                                </h5>
                                <h5 class="text-xl font-bold tracking-tight text-gray-900">poids :
                                    <?php echo $camion->getPoidsCamion(); ?> kg
                                </h5>
                                <h5 class="text-xl font-bold tracking-tight text-gray-900">ID du chauffeur :
                                    <?php echo $camion->getIdChauffeur(); ?>
                                </h5>
                                <a href="ModificationCamion?id=<?= $camion->getIDcamion(); ?>"
                                    class="inline-flex items-center px-4 py-2 bg-primary italic font-black drop-shadow-xl mt-4  text-white border bg-[#108ab1] font-bold rounded-lg">
                                    modifier
                                </a>
                                <a href="supprimerCamion?id=<?= $camion->getIDcamion(); ?>"
                                    class="inline-flex items-center px-4 py-2  italic font-black drop-shadow-xl mt-4  text-white border bg-red-500 font-bold rounded-lg">
                                    supprimer
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>
            <?php endif; ?>

        </div>
    </div>



</div>
</div>


</div>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="./js/gestioncamion.js"></script>
<script src="./js/js_inscription.js"></script>
<?php

$content = ob_get_clean();
require_once ("./views/users/Template/layout.php");

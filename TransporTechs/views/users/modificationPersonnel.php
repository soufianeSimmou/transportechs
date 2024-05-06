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
                        src="<?php echo ($users["url_image"] == "image/") ? "./image/navlogo.jpg" : "./" . $users["url_image"]; ?>"
                        alt="Preview">
                </div>
            </div>

            <div class="col-span-1 flex flex-col">
                <label for="nom" class="text-sm text-center text-[#108ab1] font-bold mb-2">Nom</label>
                <input type="text"
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    id="nom" name="nom" value="<?= $users["Nom_employé"] ?>" required>

            </div>

            <div class="col-span-1 flex flex-col">
                <label for="prenom" class="text-sm text-center text-[#108ab1] font-bold mb-2">Prénom</label>
                <input type="text"
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    id="prenom" value="<?= $users["Prénom_employé"] ?>" name="prenom" required>
            </div>

            <div class="col-span-1 flex flex-col">
                <label for="email" class="text-sm text-center text-[#108ab1] font-bold mb-2">Email</label>
                <input type="email"
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    id="email" name="email" value="<?= $users["Email_employé"] ?>" required>
            </div>

            <div class="col-span-1 flex flex-col">
                <label for="telephone" class="text-sm text-center text-[#108ab1] font-bold mb-2">Téléphone</label>
                <input type="tel"
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    id="telephone" value="<?= $users["Téléphone_employé"] ?>" name="telephone" required>
            </div>

            <div class="col-span-1 flex flex-col">
                <label for="adresse" class="text-sm text-center text-[#108ab1] font-bold mb-2">Adresse</label>
                <textarea
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    id="adresse" name="adresse" required><?= $users["Adresse_employé"] ?></textarea>
            </div>

            <div class="col-span-1 flex flex-col">
                <label for="codepostal" class="text-sm text-center text-[#108ab1] font-bold mb-2">Code postal</label>
                <input type="text"
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    id="codepostal" value="<?= $users["Code_postal_employé"] ?>" name="codepostal" required>
            </div>

            <div class="col-span-1 flex flex-col">
                <label for="ville" class="text-sm text-center text-[#108ab1] font-bold mb-2">Ville</label>
                <input type="text"
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    id="ville" value="<?= $users["Ville_employé"] ?>" name="ville" required>
            </div>

            <div class="col-span-1 flex flex-col">
                <label for="pays" class="text-sm text-center text-[#108ab1] font-bold mb-2">Pays</label>
                <select
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    id="pays" name="pays" required>
                    <option value="">Sélectionnez un pays</option>
                    <option value="France" <?php if ($users["Pays_employé"] == "France")
                        echo "selected"; ?>>France
                    </option>
                    <option value="Espagne" <?php if ($users["Pays_employé"] == "Espagne")
                        echo "selected"; ?>>Espagne
                    </option>
                    <option value="Angleterre" <?php if ($users["Pays_employé"] == "Angleterre")
                        echo "selected"; ?>>
                        Angleterre</option>
                    <option value="Allemagne" <?php if ($users["Pays_employé"] == "Allemagne")
                        echo "selected"; ?>>
                        Allemagne</option>
                    <option value="Italie" <?php if ($users["Pays_employé"] == "Italie")
                        echo "selected"; ?>>Italie
                    </option>
                </select>
            </div>


            <div class="col-span-1 flex flex-col">
                <label for="fonction" class="text-sm text-center text-[#108ab1] font-bold mb-2">Fonction</label>
                <select
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    id="fonction" name="fonction" required>
                    <option value="">Sélectionnez votre fonction</option>
                    <option value="gestionnaire" <?php if ($users["Fonction_employé"] == "gestionnaire")
                        echo "selected"; ?>>Gestionnaire de transport</option>
                          <option value="Ressource humaine" <?php if ($users["Fonction_employé"] == "Ressource humaine")
                        echo "selected"; ?>>Ressource humaine</option>
                          <option value="ouvrier" <?php if ($users["Fonction_employé"] == "ouvrier")
                        echo "selected"; ?>>ouvrier</option>
                          <option value="responsable" <?php if ($users["Fonction_employé"] == "responsable")
                        echo "selected"; ?>>responsable</option>
                     
                </select>
            </div>
      

            <div class="col-span-1 flex flex-col">
                <label for="dateembauche" class="text-sm text-center text-[#108ab1] font-bold mb-2">Date
                    d'embauche</label>
                <input type="date"
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    value="<?= $users["Date_embauche"] ?>" id="dateembauche" name="dateembauche" required>
            </div>

            <div class="col-span-1 flex flex-col">
                <label for="salaire" class="text-sm text-center text-[#108ab1] font-bold mb-2">Salaire</label>
                <input type="number"
                    class="rounded-md border border-[#108ab1] px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    value="<?= $users["Salaire_employé"] ?>" id="salaire" name="salaire" required>
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

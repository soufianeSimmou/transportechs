



    <?php
    ob_start();
    $currentPage = 'accueil';
    include ("include/nav.php");
  
    
    ?>
    <div class="w-full h-svh bg-[#108ab1]">
        <div class="flex flex-col h-full w-full justify-start items-center"> <img src="./image/logo.jpg" alt=""
                class="w-[40rem] mt-44 h-auto">
            <div class="flex mt-28 text-[#108ab1] font-bold  "> <a href="/TransporTechs/inscription" class=" px-[1.5rem] py-[1rem] rounded-full drop-shadow-xl  bg-[#efefef] btn btn-primary flex items-center md:w-1/2 max-w-md">
                    <span class="mr-2">Inscription</span>

                </a>
                <a href="/TransporTechs/connexion" class="  px-[1.5rem] py-[1rem]  bg-[#efefef] rounded-full btn btn-outline drop-shadow-xl flex items-center ml-4 md:w-1/2 max-w-md"> <span
                        class="mr-2">Connexion</span>

                </a>
            </div>
        </div>
    </div>
    <?php
   $content = ob_get_clean();
   require_once("./views/users/Template/layout.php");

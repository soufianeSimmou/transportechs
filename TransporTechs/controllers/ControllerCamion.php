<?php
require_once 'models/Camion.php';
require_once 'models/CamionManager.php';
require_once 'models/chauffeur.php';
require_once 'models/ChauffeurManager.php';
require_once './config/config.php';
class ControllerCamion {
// supprimer un camion
    public function supprimer(){
       
        $camion = new CamionManager();
        $id = $_GET['id'];
        $camion->supprimer($id);
        header("Location: GestionCamion");
      
        
    }
    // modifier un camion
    public function  modification(){
        $title = "modification camion";
        $camion = new CamionManager();
        $id = $_GET['id'];
        $chauffeurs = $camion->afficherChauffeurs();
        $info = $camion->afficherCamion($id);
        if(isset($_POST["modifierCamion"]))
        {

          
            $donnees_camion = [
            
                
                'PoidsCamion' => $_POST['poids'],
                'IDchauffeur' => $_POST['idChauffeur'],
            
            ];
        
            // Créer une instance de la classe Employe avec les données du formulaire
            $camions = new Camion($donnees_camion);
    
    
            // Ajouter l'employé à la base de données
            $camion->modifierCamion($camions,$id);
            // Rediriger l'utilisateur vers une page de confirmation
           header("Location: GestionCamion");
        }
        require './views/users/modificationCamion.php';
    }

    // cette fonction permet de lister tout les camions et on meme temps permet d'ajouter des camions.
    public function  list(){
        try {
          
            $camionM = new CamionManager();
           
            $chauffeurs = $camionM->afficherChauffeurs();
            $camionvalue = $camionM->list();
            $title = "GestionCamion";
           
            
            if (
                isset($_POST["ajouteCamion"]) && 
                !empty($_POST['immatriculation']) && 
                !empty($_POST['marque']) && 
                !empty($_POST['poids']) && 
                !empty($_POST['idChauffeur'])) {
              
             $camionUrl ="./image/marque/". $_POST['marque'].".jpg";
                // Récupérer les données du formulaire
                $donnees_camion = [
                    'ImmatriculationCamion' => $_POST['immatriculation'],
                    'MarqueCamion' => $_POST['marque'],
                    'PoidsCamion' => $_POST['poids'],
                    'IDchauffeur' => $_POST['idChauffeur'],
                    'urlCamion' =>  $camionUrl, // Utiliser le chemin de l'image uploadée
                ];
    
                // Créer une instance de Camion avec les données récupérées
                $Camion = new Camion($donnees_camion);
    
                // Créer une instance de CamionManager avec la connexion à la base de données
                
                $camionADD = new CamionManager();
            
                // Ajouter le camion à la base de données
                $camionADD->add($Camion);
                header("Location: GestionCamion");

                
            } else {
                $title = "GestionCamion";
      
                require './views/users/GestionCamion.php';
            }
        } catch (PDOException $e) {
            // Gérer les erreurs PDO
            echo "Erreur PDO: " . $e->getMessage();
        } catch (Exception $e) {
            // Gérer les autres exceptions
            echo "Erreur: " . $e->getMessage();
        }
     
    }
   
   

}

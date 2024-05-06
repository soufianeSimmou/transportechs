<?php
require_once 'models/Employe.php';
require_once 'models/EmployeManager.php';
require_once 'models/chauffeur.php';
require_once 'models/ChauffeurManager.php';
require_once './config/config.php';
class ControllerPersonnel {
// lister les personnels
    public function  list(){
        $title = "GestionPersonnel";
        $user = new EmployeManager();
        $chauffeur = new ChauffeurManager();
        $chauffeurs = $chauffeur->list();
        $users = $user->list();
        require './views/users/GestionPersonnel.php';
    }
    // modifier un personnel
    public function  modifier(){
        $title = "modification personnel";
        $user = new EmployeManager();
        $id = $_GET['id'];
        $users = $user->afficherPersonnel($id);
        if(isset($_POST["submit"]))
        {

            $avatar_tmp_name = $_FILES["urlImage"]["tmp_name"];
            $avatar_name = $_FILES["urlImage"]["name"];
            $avatar_destination = "image/" . $avatar_name;
            move_uploaded_file($avatar_tmp_name, $avatar_destination);
            // Récupérer les données du formulaire
            $donnees_employe = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'fonction' => $_POST['fonction'],
                'dateembauche' => $_POST['dateembauche'],
                'salaire' => $_POST['salaire'],
                'adresse' => $_POST['adresse'],
                'codepostal' => $_POST['codepostal'],
                'ville' => $_POST['ville'],
                'pays' => $_POST['pays'],
                'telephone' => $_POST['telephone'],
                'urlImage' => $avatar_destination 
            ];
        
            // Créer une instance de la classe Employe avec les données du formulaire
            $employe = new Employe($donnees_employe);
    
    
            // Ajouter l'employé à la base de données
            $user->modifierPersonnel($employe,$id);
            // Rediriger l'utilisateur vers une page de confirmation
           header("Location: GestionPersonnel");
        }
        require './views/users/modificationPersonnel.php';
    }
    // modifier un chauffeur
    public function  modifierChauffeur(){
        $title = "modification personnel";
        $Chauffeurs = new ChauffeurManager();
        $id = $_GET['id'];
        $users = $Chauffeurs->afficherPersonnel($id);
        if(isset($_POST["submit"]))
        {

            $avatar_tmp_name = $_FILES["urlImage"]["tmp_name"];
            $avatar_name = $_FILES["urlImage"]["name"];
            $avatar_destination = "image/" . $avatar_name;
            move_uploaded_file($avatar_tmp_name, $avatar_destination);
            // Récupérer les données du formulaire
            $donnees_chauffeur = [
                'Nomchauffeur' => $_POST['Nomchauffeur'],
                'Prenomchauffeur' => $_POST['Prenomchauffeur'],
                'Adressechauffeur' => $_POST['Adressechauffeur'],
                'Codepostalchauffeur' => $_POST['Codepostalchauffeur'],
                'Villechauffeur' => $_POST['Villechauffeur'],
                'Payschauffeur' => $_POST['Payschauffeur'],
                'Telephonechauffeur' => $_POST['Telephonechauffeur'],
                'Emailchauffeur' => $_POST['Emailchauffeur'],
                'Numeropermis' => $_POST['Numeropermis'],
                'Dateexpirationpermis' => $_POST['Dateexpirationpermis'],
                'urlImage' => $avatar_destination 
            ];
        
            // Créer une instance de la classe Employe avec les données du formulaire
            $chauffeur = new Chauffeur($donnees_chauffeur);
    
    
            // Ajouter l'employé à la base de données
            $Chauffeurs->modifierChauffeur($chauffeur,$id);
            // Rediriger l'utilisateur vers une page de confirmation
           header("Location: GestionPersonnel");
        }
        require './views/users/modificationChaffeur.php';
    }
    // supprimer le chauffeur
    public function supprimerC(){
       
        $user = new ChauffeurManager();
        $id = $_GET['id'];
        $user->supprimerC($id);
        header("Location: GestionPersonnel");
        
        
    }
    //supprimer le personnel
    public function  supprimer(){
        
        $user = new EmployeManager();
        $id = $_GET['id'];
        $user->supprimer($id);
       
        header("Location: GestionPersonnel");
        
        
    }

}

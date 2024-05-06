<?php
require_once 'models/Employe.php';
require_once 'models/EmployeManager.php';
require_once 'models/Chauffeur.php';
require_once 'models/ChauffeurManager.php';
require_once './config/config.php';
class UsersController {
    // aller a la page index
    public function index() {
       $title = "Accueil";
        require 'views/users/index.php';
    }
    // s'inscrire
    public function inscription() {
     
            // Si aucune donnée n'a été soumise, inclure le fichier de vue
            $title = "inscription";
            require './views/users/inscription.php';
   
    }
    // ajouter un personnel
    public function addgestionnaire() {
        // Vérifier si des données ont été envoyées via POST
        if (
            isset($_POST["submit"]) && 
            !empty($_POST['nom']) && 
            !empty($_POST['prenom']) && 
            !empty($_POST['adresse']) && 
            !empty($_POST['fonction']) && 
            !empty($_POST['dateembauche']) && 
            !empty($_POST['codepostal']) && 
            !empty($_POST['salaire']) && 
            filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && 
            !empty($_POST['telephone']) && 
            !empty($_POST['ville']) && 
            strlen($_POST['MotDePasse']) >= 8 && // Au moins 8 caractères
            preg_match('/[A-Z]/', $_POST['MotDePasse']) && // Au moins une lettre majuscule
            preg_match('/[a-z]/', $_POST['MotDePasse']) && // Au moins une lettre minuscule
            preg_match('/\d/', $_POST['MotDePasse']) && // Au moins un chiffre
            preg_match('/[^a-zA-Z0-9]/', $_POST['MotDePasse']) // Au moins un caractère spécial
        ) 
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
                'MotDePasse' => $_POST['MotDePasse'],
                'urlImage' => $avatar_destination 
            ];
    
            // Hacher le mot de passe
            $hashedPassword = password_hash($_POST['MotDePasse'], PASSWORD_DEFAULT);
            // Stocker le mot de passe haché dans les données de l'employé
            $donnees_employe['MotDePasse'] = $hashedPassword;
    
            // Créer une instance de la classe Employe avec les données du formulaire
            $employe = new Employe($donnees_employe);
    
            // Créer une instance de EmployeManager avec la connexion à la base de données
            $employeManager = new EmployeManager();
    
            // Ajouter l'employé à la base de données
            $employeManager->add($employe);
            
          
        } else {
            // Si aucune donnée n'a été soumise, inclure le fichier de vue
            $title = "inscription";
            require './views/users/gestionnaire.php';
        }
    }
    // ajouter un chauffeur
    public function addchauffeur()
    {
        // Vérifier si des données ont été envoyées via POST
        if (
            isset($_POST["submit"]) && 
            !empty($_POST['Nomchauffeur']) && 
            !empty($_POST['Prenomchauffeur']) && 
            !empty($_POST['Adressechauffeur']) && 
            !empty($_POST['Codepostalchauffeur']) && 
            !empty($_POST['Villechauffeur']) && 
            !empty($_POST['Payschauffeur']) && 
            !empty($_POST['Telephonechauffeur']) && 
            filter_var($_POST['Emailchauffeur'], FILTER_VALIDATE_EMAIL) && 
            !empty($_POST['Numeropermis']) && 
            !empty($_POST['Dateexpirationpermis']) && 
            strlen($_POST['MotDePasse']) >= 8 && // Au moins 8 caractères
            preg_match('/[A-Z]/', $_POST['MotDePasse']) && // Au moins une lettre majuscule
            preg_match('/[a-z]/', $_POST['MotDePasse']) && // Au moins une lettre minuscule
            preg_match('/\d/', $_POST['MotDePasse']) && // Au moins un chiffre
            preg_match('/[^a-zA-Z0-9]/', $_POST['MotDePasse']) // Au moins un caractère spécial
        )  {
            $avatar_tmp_name = $_FILES["urlImage"]["tmp_name"];
            $avatar_name = $_FILES["urlImage"]["name"];
            $avatar_destination = "image/" . $avatar_name;
            move_uploaded_file($avatar_tmp_name, $avatar_destination);
            $statut = "aucun camion a disposition";
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
                'MotDePasse' => $_POST['MotDePasse'],
                'urlImage' => $avatar_destination,
                'statut' => $statut
            ];
            
           
          
            // Hacher le mot de passe
            $hashedPassword = password_hash($_POST['MotDePasse'], PASSWORD_DEFAULT);
    
            // Stocker le mot de passe haché dans les données du chauffeur
            $donnees_chauffeur['MotDePasse'] = $hashedPassword;
            $chauffeur = new Chauffeur($donnees_chauffeur);
    
            // Créer une instance de ChauffeurManager avec la connexion à la base de données
            $chauffeurManager = new ChauffeurManager();
    
            // Ajouter le chauffeur à la base de données
            $chauffeurManager->add($chauffeur);
        } else {
            // Si aucune donnée n'a été soumise, inclure le fichier de vue
            $title = "inscription";
            require './views/users/chauffeur.php';
        }
    }
    // se connecter
    public function connexion() {
        $title = "connexion";
        require './views/users/connexion.php';
        
        if (isset($_POST["submit"])) {
            // Récupérer les données du formulaire
            $email = $_POST["email"];
            $password = $_POST["MotDePasse"];
    
            // Créer un objet Employe avec les données du formulaire
            $employe = new Employe(['email' => $email, 'MotDePasse' => $password]);
    
            // Appeler la méthode login pour connecter l'utilisateur
            $employeManager = new EmployeManager(); // Assurez-vous que $pdo est initialisé
            $employeManager->login($employe);
            
        }
    }
    
}

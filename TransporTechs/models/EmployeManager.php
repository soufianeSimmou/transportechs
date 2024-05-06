<?php
class EmployeManager
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
    public function add(Employe $employe)
    {
        try {
            $query = $this->pdo->prepare('INSERT INTO Employés(Nom_employé, Prénom_employé, Adresse_employé, Code_postal_employé, Ville_employé, Pays_employé, Téléphone_employé, Email_employé, Fonction_employé, Date_embauche, Salaire_employé, MotDePasse, url_image) VALUES(:nom, :prenom, :adresse, :codepostal, :ville, :pays, :telephone, :email, :fonction, :dateembauche, :salaire, :MotDePasse, :urlImage)');
            $query->bindValue(':nom', $employe->getNom());
            $query->bindValue(':prenom', $employe->getPrenom());
            $query->bindValue(':adresse', $employe->getAdresse());
            $query->bindValue(':codepostal', $employe->getCodePostal());
            $query->bindValue(':ville', $employe->getVille());
            $query->bindValue(':pays', $employe->getPays());
            $query->bindValue(':telephone', $employe->getTelephone());
            $query->bindValue(':email', $employe->getEmail());
            $query->bindValue(':fonction', $employe->getFonction());
            $query->bindValue(':dateembauche', $employe->getDateEmbauche());
            $query->bindValue(':salaire', $employe->getSalaire());
            $query->bindValue(':MotDePasse', $employe->getMotDePasse());
            $query->bindValue(':urlImage', $employe->getUrlImage());
            $query->execute();
            
            if($employe->getFonction() == "chauffeur") {
                header("Location: chauffeur"); // Rediriger vers la page "chauffeur.php"
                exit;
            } else {
                if($_SESSION["id"] == null){
                    header("Location: connexion"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
                    exit;
                } else {
                    header("Location: GestionPersonnel"); // Rediriger vers la page "GestionPersonnel.php" si l'utilisateur est connecté et n'est pas un chauffeur
                    exit;
                }
            }
        } catch (PDOException $e) {
            // Laisser PDO gérer l'erreur sans afficher de message
            // Il est recommandé de journaliser l'erreur pour le suivi
            error_log("Erreur lors de l'ajout de l'employé : " . $e->getMessage());
            // Redirection vers une page d'erreur ou une autre action appropriée
            header("Location: erreur-page.php");
            exit;
        }
    }
    
    

    public function login(Employe $user)
    {
        try {
            $q = $this->pdo->prepare("SELECT * FROM employés WHERE Email_employé = :email");
            $q->bindValue(":email", $user->getEmail());
            $q->execute();

            // Récupérer les résultats de la requête
            $result = $q->fetch(PDO::FETCH_ASSOC);

            // Vérifier si le mot de passe fourni correspond au mot de passe haché stocké
            if ($result && password_verify($user->getMotDePasse(), $result['MotDePasse'])) {
        
                $_SESSION['id'] = $result['ID_employé'];
                $_SESSION['nom'] = $result['Nom_employé'];
                $_SESSION['prenom'] = $result['Prénom_employé'];
                $_SESSION['email'] = $result['Email_employé'];
                $_SESSION['url'] = $result['url_image'];
                header("Location: GestionAccueil");
                exit;
                // Rediriger l'utilisateur après la connexion
            }
        } catch (PDOException $e) {
            echo "Erreur lors du login : " . $e->getMessage();
        }
    }
    public function list()
    {
        try {
            $q = $this->pdo->prepare("SELECT * FROM Employés");
            
            if ($q->execute()) {
                $users = [];
                while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                    $user = new Employe([
                        'id' => $row['ID_employé'],
                        'nom' => $row['Nom_employé'],
                        'prenom' => $row['Prénom_employé'],
                        'adresse' => $row['Adresse_employé'],
                        'codepostal' => $row['Code_postal_employé'],
                        'ville' => $row['Ville_employé'],
                        'pays' => $row['Pays_employé'],
                        'telephone' => $row['Téléphone_employé'],
                        'email' => $row['Email_employé'],
                        'fonction' => $row['Fonction_employé'],
                        'dateembauche' => $row['Date_embauche'],
                        'salaire' => $row['Salaire_employé'],
                        'MotDePasse' => $row['MotDePasse'],
                        'urlImage' => $row['url_image']
                    ]);
                    $users[] = $user;
                }
    
                return $users;
            } else {
                // Gérer l'échec de l'exécution de la requête
                echo "La requête n'a pas pu être exécutée.";
            }
           
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des employés : " . $e->getMessage();
        }
    }
    public function afficherPersonnel($id)
    {
        try {
            $q = $this->pdo->prepare("SELECT * FROM Employés where ID_employé = :id;");
            $q->bindValue(':id', $id);
            // Exécution de la requête
            if ($q->execute()) {
                // Récupération des résultats
                $user = $q->fetch(PDO::FETCH_ASSOC);
                return $user; // Retourne les informations de l'utilisateur
            } else {
                return false; // Retourne faux si la requête a échoué
            }
        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            echo "Erreur PDO : " . $e->getMessage();
            return false;
        }
    }
    public function modifierPersonnel(Employe $user, int $id)
    {
        try {
            // SQL query to update employee information
            $query = 'UPDATE Employés SET Nom_employé = :nom, Prénom_employé = :prenom, Adresse_employé = :adresse, Code_postal_employé = :codepostal, Ville_employé = :ville, Pays_employé = :pays, Téléphone_employé = :telephone, Email_employé = :email, Fonction_employé = :fonction, Date_embauche = :dateembauche, Salaire_employé = :salaire,  url_image = :urlImage WHERE ID_employé = :id';
        
            // Prepare the query
            $stmt = $this->pdo->prepare($query);
        
            // Bind values with placeholders in the query
            $stmt->bindValue(':nom', $user->getNom());
            $stmt->bindValue(':prenom', $user->getPrenom());
            $stmt->bindValue(':adresse', $user->getAdresse());
            $stmt->bindValue(':codepostal', $user->getCodePostal());
            $stmt->bindValue(':ville', $user->getVille());
            $stmt->bindValue(':pays', $user->getPays());
            $stmt->bindValue(':telephone', $user->getTelephone());
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':fonction', $user->getFonction());
            $stmt->bindValue(':dateembauche', $user->getDateEmbauche());
            $stmt->bindValue(':salaire', $user->getSalaire());
            $stmt->bindValue(':urlImage', $user->getUrlImage());
            $stmt->bindValue(':id', $id);
        
            // Execute the query
            if ($stmt->execute()) {
                return true; // Return true if modification is successful
            } else {
                return false; // Return false if modification fails
            }
        } catch (PDOException $e) {
            // PDO error handling
            echo "PDO Error: " . $e->getMessage();
            return false;
        }
    }  public function supprimer(int $id)
    {
        try {
            // SQL query to delete an employee
            $query = 'DELETE FROM Employés WHERE ID_employé = :id';
            
            // Prepare the query
            $stmt = $this->pdo->prepare($query);
            
            // Bind the ID parameter
            $stmt->bindValue(':id', $id);
            
            // Execute the query
            if ($stmt->execute()) {
                return true; // Return true if deletion is successful
            } else {
                return false; // Return false if deletion fails
            }
        } catch (PDOException $e) {
            // PDO error handling
            echo "PDO Error: " . $e->getMessage();
            return false;
        }
    }
    
}

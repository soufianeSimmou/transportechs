<?php

class ChauffeurManager
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

  public function add(Chauffeur $chauffeur)
{
    try {
        $query = $this->pdo->prepare('INSERT INTO chauffeurs(Nomchauffeur, Prenomchauffeur, Adressechauffeur, Codepostalchauffeur, Villechauffeur, Payschauffeur, Telephonechauffeur, Emailchauffeur, Numeropermis, Dateexpirationpermis, MotDePasse, urlImage,statut) VALUES(:nom, :prenom, :adresse, :codepostal, :ville, :pays, :telephone, :email, :numPermis, :dateExpiration, :motDePasse, :urlImage, :statut)');
        $query->bindValue(':nom', $chauffeur->getNomChauffeur());
        $query->bindValue(':prenom', $chauffeur->getPrenomChauffeur());
        $query->bindValue(':adresse', $chauffeur->getAdresseChauffeur());
        $query->bindValue(':codepostal', $chauffeur->getCodePostalChauffeur());
        $query->bindValue(':ville', $chauffeur->getVilleChauffeur());
        $query->bindValue(':pays', $chauffeur->getPaysChauffeur());
        $query->bindValue(':telephone', $chauffeur->getTelephoneChauffeur());
        $query->bindValue(':email', $chauffeur->getEmailChauffeur());
        $query->bindValue(':numPermis', $chauffeur->getNumeroPermis());
        $query->bindValue(':dateExpiration', $chauffeur->getDateExpirationPermis());
        $query->bindValue(':motDePasse', $chauffeur->getMotDePasse());
        $query->bindValue(':urlImage', $chauffeur->getUrlImage());
        $query->bindValue(':statut', $chauffeur->getStatut());
           // Exécuter la requête
          $query->execute();
  
           if($_SESSION["id"] == null){
              header("Location: connexion"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
             exit;
          } else {
             header("Location: GestionPersonnel"); // Rediriger vers la page "GestionPersonnel.php" si l'utilisateur est connecté et n'est pas un chauffeur
             exit;
           }
     
      
    } catch (PDOException $e) {
        // Laisser PDO gérer l'erreur sans afficher de message
        // Il est recommandé de journaliser l'erreur pour le suivi
       echo $e->getMessage();
        // Redirection vers une page d'erreur ou une autre action appropriée
     
        var_dump($chauffeur);
    }
}
public function supprimerC(int $id)
    {
        try {
            // SQL query to delete an employee
            $query = 'DELETE FROM chauffeurs WHERE IDchauffeur = :id';
            
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
public function list()
{
    try {
        $query = $this->pdo->prepare("SELECT * FROM chauffeurs");
        
        if ($query->execute()) {
            $chauffeurs = [];
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $chauffeur = new Chauffeur([
                    'IDchauffeur' => $row['IDchauffeur'],
                    'Nomchauffeur' => $row['Nomchauffeur'],
                    'Prenomchauffeur' => $row['Prenomchauffeur'],
                    'Adressechauffeur' => $row['Adressechauffeur'],
                    'Codepostalchauffeur' => $row['Codepostalchauffeur'],
                    'Villechauffeur' => $row['Villechauffeur'],
                    'Payschauffeur' => $row['Payschauffeur'],
                    'Telephonechauffeur' => $row['Telephonechauffeur'],
                    'Emailchauffeur' => $row['Emailchauffeur'],
                    'Numeropermis' => $row['Numeropermis'],
                    'Dateexpirationpermis' => $row['Dateexpirationpermis'],
                    'MotDePasse' => $row['MotDePasse'],
                    'urlImage' => $row['urlImage'],
                    'statut' => $row['statut']
                ]);
                $chauffeurs[] = $chauffeur;
            }

            return $chauffeurs;
        } else {
            // Gérer l'échec de l'exécution de la requête
            echo "La requête n'a pas pu être exécutée.";
        }
       
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des chauffeurs : " . $e->getMessage();
    }
}
public function afficherPersonnel($id)
{
    try {
        $q = $this->pdo->prepare("SELECT * FROM Chauffeurs where IDchauffeur = :id;");
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
public function modifierChauffeur(Chauffeur $chauffeur, int $id)
{
    try {
        // Requête SQL pour mettre à jour les informations du chauffeur
        $query = 'UPDATE Chauffeurs SET Nomchauffeur = :nom, Prenomchauffeur = :prenom, Adressechauffeur = :adresse, Codepostalchauffeur = :codepostal, Villechauffeur = :ville, Payschauffeur = :pays, Telephonechauffeur = :telephone, Emailchauffeur = :email, Numeropermis = :numPermis, Dateexpirationpermis = :dateExpiration, urlImage = :urlImage WHERE IDchauffeur = :id';
    
        // Préparer la requête
        $stmt = $this->pdo->prepare($query);
    
        // Liaison des valeurs avec les paramètres de la requête
        $stmt->bindValue(':nom', $chauffeur->getNomChauffeur());
        $stmt->bindValue(':prenom', $chauffeur->getPrenomChauffeur());
        $stmt->bindValue(':adresse', $chauffeur->getAdresseChauffeur());
        $stmt->bindValue(':codepostal', $chauffeur->getCodePostalChauffeur());
        $stmt->bindValue(':ville', $chauffeur->getVilleChauffeur());
        $stmt->bindValue(':pays', $chauffeur->getPaysChauffeur());
        $stmt->bindValue(':telephone', $chauffeur->getTelephoneChauffeur());
        $stmt->bindValue(':email', $chauffeur->getEmailChauffeur());
        $stmt->bindValue(':numPermis', $chauffeur->getNumeroPermis());
        $stmt->bindValue(':dateExpiration', $chauffeur->getDateExpirationPermis());
        $stmt->bindValue(':urlImage', $chauffeur->getUrlImage());
        $stmt->bindValue(':id', $id);
    
        // Exécuter la requête
        if ($stmt->execute()) {
            return true; // Retourne vrai si la modification est réussie
        } else {
            return false; // Retourne faux si la modification échoue
        }
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        echo "Erreur PDO : " . $e->getMessage();
        return false;
    }
}

}

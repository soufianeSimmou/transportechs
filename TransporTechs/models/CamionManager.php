<?php

class CamionManager
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

    public function add(Camion $camion)
    {
        try {
            $query = $this->pdo->prepare('INSERT INTO camions(ImmatriculationCamion, MarqueCamion, PoidsCamion, IDChauffeur,urlCamion) VALUES(:immatriculation, :marque, :poids, :idChauffeur,:urlCamion)');
            $query->bindValue(':immatriculation', $camion->getImmatriculationCamion());
            $query->bindValue(':marque', $camion->getMarqueCamion());
            $query->bindValue(':poids', $camion->getPoidsCamion());
            $query->bindValue(':idChauffeur', $camion->getIDChauffeur());
            $query->bindValue(':urlCamion', $camion->geturlCamion());

            $query->execute();
            $q = $this->pdo->prepare("UPDATE chauffeurs SET statut = :idCamion WHERE IDchauffeur = :idChauffeur");
    $q->bindValue(':idChauffeur', $camion->getIDChauffeur());
    $q->bindValue(':idCamion'," est utilisee par ce chauffeur");
    
    $q->execute();
    } catch (PDOException $e) {
        // Laisser PDO gérer l'erreur sans afficher de message
        // Il est recommandé de journaliser l'erreur pour le suivi
       echo $e->getMessage();
        // Redirection vers une page d'erreur ou une autre action appropriée
     
    }
  
}public function list()
{
    try {
        $query = $this->pdo->prepare("SELECT * FROM camions");
        
        if ($query->execute()) {
            $camions = [];
            
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                // Créer un nouvel objet Camion avec les données de la base de données
                $camion = new Camion($row);
                // Ajouter le camion à la liste
                $camions[] = $camion;
            }

            return $camions;
        } else {
            // Gérer l'échec de l'exécution de la requête
            echo "La requête n'a pas pu être exécutée.";
            return null; // Ou une autre action appropriée en cas d'échec
        }
       
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des camions : " . $e->getMessage();
        return null; // Ou une autre action appropriée en cas d'erreur
    }
}
public function modifierCamion(Camion $camion, int $id)
{
    try {
        // Récupérer l'ancien chauffeur du camion
        $ancienChauffeurQuery = $this->pdo->prepare("SELECT IDchauffeur FROM camions WHERE IDcamion = :id");
        $ancienChauffeurQuery->bindValue(':id', $id);
        $ancienChauffeurQuery->execute();
        $ancienChauffeurRow = $ancienChauffeurQuery->fetch(PDO::FETCH_ASSOC);

        // Mettre à jour le statut de l'ancien chauffeur
        if ($ancienChauffeurRow) {
            $ancienChauffeurId = $ancienChauffeurRow['IDchauffeur'];
            $ancienChauffeurUpdateQuery = $this->pdo->prepare("UPDATE chauffeurs SET statut = 'aucun camion a disposition' WHERE IDchauffeur = :chauffeurId");
            $ancienChauffeurUpdateQuery->bindValue(':chauffeurId', $ancienChauffeurId);
            $ancienChauffeurUpdateQuery->execute();
        }
        
        // Mettre à jour le camion avec le nouveau chauffeur
        $updateQuery = $this->pdo->prepare("UPDATE camions SET IDchauffeur = :chauffeur, PoidsCamion = :poids WHERE IDcamion = :id");
        $updateQuery->bindValue(':chauffeur', $camion->getIDchauffeur());
        $updateQuery->bindValue(':poids', $camion->getPoidsCamion());
        $updateQuery->bindValue(':id', $id);
        $updateQuery->execute();

        // Mettre à jour le statut du nouveau chauffeur
        $nouveauChauffeurUpdateQuery = $this->pdo->prepare("UPDATE chauffeurs SET statut = 'chauffeur occupé' WHERE IDchauffeur = :chauffeurId");
        $nouveauChauffeurUpdateQuery->bindValue(':chauffeurId', $camion->getIDchauffeur());
        $nouveauChauffeurUpdateQuery->execute();
        
        return true; // Retourne vrai si la modification est réussie
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        echo "Erreur PDO : " . $e->getMessage();
        return false;
    }
}


public function afficherCamion($id)
{
    try {
        $q = $this->pdo->prepare("SELECT * FROM camions where IDcamion = :id;");
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
public function supprimer(int $id)
{
    try {
        // SQL query to delete an employee
        $query = 'DELETE FROM camions WHERE IDcamion = :id';
        
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
public function afficherChauffeurs()
{
    try {
        $q = $this->pdo->prepare("SELECT * FROM chauffeurs ");
      
        // Exécution de la requête
        if ($q->execute()) {
            // Récupération des résultats sous forme de tableau
            $chauffeurs = $q->fetchAll(PDO::FETCH_ASSOC);
            return $chauffeurs; // Retourne tous les chauffeurs
        } else {
            return false; // Retourne faux si la requête a échoué
        }
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        echo "Erreur PDO : " . $e->getMessage();
        return false;
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

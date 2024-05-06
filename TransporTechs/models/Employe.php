<?php
class Employe
{
    // Attributs pour stocker les informations de l'employé
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $fonction;
    private $dateembauche;
    private $salaire;
    private $adresse;
    private $codepostal;
    private $ville;
    private $pays;
    private $telephone;
    private $MotDePasse;

    private $urlImage;
    // Constructeur
    public function __construct(array $donnees = [])
    {
        $this->hydrate($donnees);
    }

    // Hydrateur : Permet de définir les attributs en une seule opération
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Méthodes pour obtenir les informations de l'employé
    public function getId()
    {
        return $this->id;
    }
    public function getMotDePasse()
    {
        return $this->MotDePasse;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFonction()
    {
        return $this->fonction;
    }

    public function getDateEmbauche()
    {
        return $this->dateembauche;
    }

    public function getSalaire()
    {
        return $this->salaire;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getCodePostal()
    {
        return $this->codepostal;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function getPays()
    {
        return $this->pays;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }
    public function geturlImage()
    {
        return $this->urlImage;
    }
    // Méthodes pour modifier les informations de l'employé
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    public function setDateEmbauche($dateembauche)
    {
        $this->dateembauche = $dateembauche;
    }

    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function setCodePostal($codepostal)
    {
        $this->codepostal = $codepostal;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
    public function setMotDePasse($MotDePasse)
    {
        $this->MotDePasse = $MotDePasse;
    }
}

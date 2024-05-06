<?php
class Chauffeur
{
    private $idchauffeur;
    private $nomchauffeur;
    private $prenomchauffeur;
    private $adressechauffeur;
    private $codepostalchauffeur;
    private $villechauffeur;
    private $payschauffeur;
    private $telephonechauffeur;
    private $emailchauffeur;
    private $numeropermis;
    private $dateexpirationpermis;
    private $motDePasse;
    private $urlImage;
    private $statut;

    public function __construct(array $donnees = [])
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getIdChauffeur()
    {
        return $this->idchauffeur;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }
    public function getStatut()
    {
        return $this->statut;
    }

    public function setIdChauffeur($idchauffeur)
    {
        $this->idchauffeur = $idchauffeur;
    }

    public function getNomChauffeur()
    {
        return $this->nomchauffeur;
    }

    public function setNomChauffeur($nomchauffeur)
    {
        $this->nomchauffeur = $nomchauffeur;
    }

    public function getPrenomChauffeur()
    {
        return $this->prenomchauffeur;
    }

    public function setPrenomChauffeur($prenomchauffeur)
    {
        $this->prenomchauffeur = $prenomchauffeur;
    }

    public function getAdresseChauffeur()
    {
        return $this->adressechauffeur;
    }

    public function setAdresseChauffeur($adressechauffeur)
    {
        $this->adressechauffeur = $adressechauffeur;
    }

    public function getCodePostalChauffeur()
    {
        return $this->codepostalchauffeur;
    }

    public function setCodePostalChauffeur($codepostalchauffeur)
    {
        $this->codepostalchauffeur = $codepostalchauffeur;
    }

    public function getVilleChauffeur()
    {
        return $this->villechauffeur;
    }

    public function setVilleChauffeur($villechauffeur)
    {
        $this->villechauffeur = $villechauffeur;
    }

    public function getPaysChauffeur()
    {
        return $this->payschauffeur;
    }

    public function setPaysChauffeur($payschauffeur)
    {
        $this->payschauffeur = $payschauffeur;
    }

    public function getTelephoneChauffeur()
    {
        return $this->telephonechauffeur;
    }

    public function setTelephoneChauffeur($telephonechauffeur)
    {
        $this->telephonechauffeur = $telephonechauffeur;
    }

    public function getEmailChauffeur()
    {
        return $this->emailchauffeur;
    }

    public function setEmailChauffeur($emailchauffeur)
    {
        $this->emailchauffeur = $emailchauffeur;
    }

    public function getNumeroPermis()
    {
        return $this->numeropermis;
    }

    public function setNumeroPermis($numeropermis)
    {
        $this->numeropermis = $numeropermis;
    }

    public function getDateExpirationPermis()
    {
        return $this->dateexpirationpermis;
    }

    public function setDateExpirationPermis($dateexpirationpermis)
    {
        $this->dateexpirationpermis = $dateexpirationpermis;
    }
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }

    public function getUrlImage()
    {
        return $this->urlImage;
    }

    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;
    }
}
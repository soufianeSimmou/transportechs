<?php 
class Camion
{
    private $IDcamion;
    private $ImmatriculationCamion;
    private $MarqueCamion;
    private $PoidsCamion;
    private $IDchauffeur;
    private $urlCamion;

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

    // Getters et setters...

    public function getIDcamion()
    {
        return $this->IDcamion;
    }
    public function geturlCamion()
    {
        return $this->urlCamion;
    }
    public function seturlCamion($urlCamion)
    {
        $this->urlCamion = $urlCamion;
    }
    public function setIDcamion($IDcamion)
    {
        $this->IDcamion = $IDcamion;
    }

    public function getImmatriculationCamion()
    {
        return $this->ImmatriculationCamion;
    }

    public function setImmatriculationCamion($immatriculationCamion)
    {
        $this->ImmatriculationCamion = $immatriculationCamion;
    }

    public function getMarqueCamion()
    {
        return $this->MarqueCamion;
    }

    public function setMarqueCamion($marqueCamion)
    {
        $this->MarqueCamion = $marqueCamion;
    }

    public function getPoidsCamion()
    {
        return $this->PoidsCamion;
    }

    public function setPoidsCamion($poidsCamion)
    {
        $this->PoidsCamion = $poidsCamion;
    }

    public function getIDchauffeur()
    {
        return $this->IDchauffeur;
    }

    public function setIDchauffeur($IDchauffeur)
    {
        $this->IDchauffeur = $IDchauffeur;
    }
}

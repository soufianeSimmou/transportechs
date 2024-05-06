<?php
require_once 'models/Employe.php';
require_once 'models/EmployeManager.php';
require_once './config/config.php';
class ControllerPad {
// aller a la page d'acceuil
    public function  GestionAccueil(){
        $title = "GestionAccueil";
        require './views/users/GestionAccueil.php';
    }
// se deconnecter
    public function destroySession(){
        session_destroy();
        
        header("Location: ./");
    }
}

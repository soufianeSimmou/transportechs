<?php
 require_once("./models/Database.php");
$database = New Database;
$database->connect("gestion_transport", "root", ""); 
session_start(); 
$_SERVER['pdo'] = $database->getConnection();

try {
    require_once("./models/Router.php");

    // Instancier le routeur
    $router = new Route();

    // Route parametre(route,controller,function)
    $router->addRoute('', 'UsersController', 'index');
    $router->addRoute('inscription', 'UsersController', 'inscription');
    $router->addRoute('connexion', 'UsersController', 'connexion');
    $router->addRoute('GestionAccueil', 'ControllerPad', 'GestionAccueil');
    $router->addRoute('destroy', 'ControllerPad', 'destroySession');
    $router->addRoute('GestionPersonnel', 'ControllerPersonnel', 'list');
    $router->addRoute('GestionCamion', 'ControllerCamion', 'list');
    $router->addRoute('modification', 'ControllerPersonnel', 'modifier');
    $router->addRoute('modificationChauffeur', 'ControllerPersonnel', 'modifierChauffeur');
    $router->addRoute('chauffeur', 'UsersController', 'addchauffeur');
    $router->addRoute('gestionnaire', 'UsersController', 'addgestionnaire');
    $router->addRoute('supprimer', 'ControllerPersonnel', 'supprimer');
    $router->addRoute('supprimerC', 'ControllerPersonnel', 'supprimerC');
    $router->addRoute('addcamion', 'ControllerCamion', 'addcamion');
    $router->addRoute('supprimerCamion', 'ControllerCamion', 'supprimer');
    $router->addRoute('ModificationCamion', 'ControllerCamion', 'Modification');
    // Récupérer l'URL de la requête
    $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    // Partie à enlever
    $partToRemove = "/TransporTechs/";
    // Enlever la partie de l'URL
    $newUrl = str_replace($partToRemove, '', $url);

    // Routage de l'URL
    $_SERVER['route'] = $newUrl;
    $router->route($newUrl);
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}
<?php
class Route
{
    private $_routes = [];

    public function addRoute($route, $controller, $action)
    {
        $this->_routes[$route] = ['controller' => $controller, 'action' => $action];
    }
   
    
    public function route($url)
    {
        // Transformer la chaine de caractère en deux partie index.php[0]?([1]id=1)
        $url = explode('?', $url)[0];
        if (array_key_exists($url, $this->_routes)) {
            $controller = $this->_routes[$url]['controller'];
            $action = $this->_routes[$url]['action'];

            // Inclure le fichier du contrôleur
            require_once './controllers/' . $controller . '.php';

            // Instancier le contrôleur
            $controller = new $controller();

            // Appeler l'action
            $controller->$action();
        } else {
            $title = "Not found";
            
        }
    }
    private function parseParams($paramString)
    {
        $params = [];
        parse_str($paramString, $params);
        return $params;
    }
}
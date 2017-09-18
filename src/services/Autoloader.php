<?php

/**
 * Created by PhpStorm.
 * User: Julie
 * Date: 27/06/2017
 * Time: 11:55
 */
class Autoloader {

    public $controller;

    public function __construct() {
        $this->getParam = $_GET;
    }

    public function autoload($class) {
        $controller = (isset($this->getParam['controller'])) ? $this->getParam['controller'] : DEFAULT_CONTROLLER;
        $controller = ucfirst($controller);
        $controller .= "Controller";

        if (!strstr($controller, 'Controller') == false) {
            require_once __DIR__ . '/../class/Controller/' . $controller . '.php';
            require_once __DIR__ . '/../class/Model/BaseModel.php';
            require_once __DIR__ . '/../class/Model/ProspectModel.php';
            require_once __DIR__ . '/../class/Model/ClientModel.php';
            require_once __DIR__ . '/../class/View/ProspectView.php';
            require_once __DIR__ . '/../class/View/ClientView.php';
            require_once __DIR__ . '/../class/View/HomeView.php';
        }
        return $controller;
    }

}

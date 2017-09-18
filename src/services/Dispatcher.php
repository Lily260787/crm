<?php

/**
 * Description of Dispatcher
 *
 * @author Julie
 */
require __DIR__ . '/../class/BaseController.php';

class Dispatcher {

    private $getParam;
    private $postParam;
    private $controller;
    private $action;

    public function __construct() {
        $this->getParam = $_GET;
    }

    private function formateController($controller) {
        $controller = ucfirst($controller);
        $controller .= "Controller";
        return $controller;
    }

    private function formateAction($action) {
        $action .= "Action";
        return $action;
    }

    public function dispatch() {
        $controller = (isset($this->getParam['controller'])) ? $this->getParam['controller'] : DEFAULT_CONTROLLER;
        $action = (isset($this->getParam['action'])) ? $this->getParam['action'] : DEFAULT_ACTION;

        switch ($controller) {
            case "home":
                $controller = $this->formateController($controller);
                $action = $this->formateAction($action);
                $this->controller = new $controller("home");
                $this->controller->$action("rdv", "projet");
                break;
            case "societe":
                $controller = $this->formateController($controller);
                $action = $this->formateAction($action);
                $this->controller = new $controller("societe");
                $this->controller->$action("societe");
                break;
            case "contact":
                $controller = $this->formateController($controller);
                $action = $this->formateAction($action);
                $this->controller = new $controller("contact");
                $this->controller->$action("contact");
                break;
            case "projet":
                $controller = $this->formateController($controller);
                $action = $this->formateAction($action);
                $this->controller = new $controller("projet");
                $this->controller->$action("projet");
                break;
            case "rdv":
                $controller = $this->formateController($controller);
                $action = $this->formateAction($action);
                $this->controller = new $controller("rdv");
                $this->controller->$action("rdv");
                break;
            default:
                echo "Attention la page demandée n'existe pas";
                break;
        }
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author Julie
 */
require_once('Home/HomeController.php');
require_once('Home/HomeModel.php');
require_once('Home/HomeView.php');
require_once('Societe/SocieteController.php');
require_once('Societe/SocieteModel.php');
require_once('Societe/SocieteView.php');
require_once('Contact/ContactView.php');
require_once('Contact/ContactModel.php');
require_once('Contact/ContactController.php');
require_once('Projet/ProjetController.php');
require_once('Projet/ProjetModel.php');
require_once('Projet/ProjetView.php');
require_once('Produit/ProduitController.php');
require_once('Produit/ProduitModel.php');
require_once('Produit/ProduitView.php');
require_once('Produit/ProduitController.php');
require_once('Produit/ProduitModel.php');
require_once('Rdv/RdvView.php');
require_once('Rdv/RdvModel.php');
require_once('Rdv/RdvController.php');

class BaseController {

    protected $view;
    protected $model;
    protected $postParam;
    protected $getParam;

    public function __construct($sujet) {

        $this->postParam = (!empty($_POST)) ? $_POST : null;
        $this->getParam = (!empty($_GET)) ? $_GET : null;
        $sujet = ucfirst($sujet);
        $classModel = $sujet . "Model";
        $classView = $sujet . "View";
        $this->view = new $classView();
        $this->model = new $classModel();
    }

    public function addAction($sujet) {
        $this->model->add($sujet, $this->postParam);
        $this->view->addDisplayCompanyForm($sujet);
    }

    public function upAction($sujet) {
        $this->model->up($sujet, $this->postParam);
    }

}

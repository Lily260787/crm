<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SocieteController
 *
 * @author Julie
 */
class SocieteController extends BaseController {
    /*
     * Récupère la liste des sociétés et les affiche
     */

    public function listAction($sujet) {
        $list = $this->model->listModel($sujet);
        $this->view->listDisplay($list);
    }

    /*
     * Affiche le formulaire d'ajout de nouvelles sociétés
     */

    public function addDisplayCompanyFormAction($sujet) {
        $this->view->addDisplayCompanyForm($sujet);
    }

    /*
     * Création d'une nouvelle société et affichage du formulaire d'ajout
     */

    public function addAction($sujet) {
        $this->model->add($sujet, $this->postParam);
        $this->view->addDisplayCompanyForm($sujet);
    }

    /*
     * Récupère la liste des sociétés et affiche la liste dans un select pour MAJ
     */

    public function selectUpDisplayCompanyFormAction($sujet) {
        $list = $this->model->listModel($sujet);
        $this->view->selectUpDisplayCompanyForm($list);
    }

    /*
     * Affiche le formulaire de MAJ de sociétés
     */

    public function upDisplayCompanyFormAction($sujet) {
        $this->view->upDisplayCompanyForm($sujet);
    }

    /*
     * Sélection d'une société et affichage ensuite du formulaire de MAJ pré-rempli
     */

    public function getParamSelectAction($sujet) {
        var_dump($this->postParam);
        var_dump($this->getParam);
        $list = $this->model->getParamSelect($sujet, $this->postParam, $this->getParam);
        $this->view->upDisplayCompanyForm($list);
    }

    /*
     * Modification d'une société et affichage d'un bouton "revenir à la sélection" 
     */

    public function upAction($sujet) {
        $this->model->up($sujet, $this->postParam);
        $this->view->companyDisplay();
    }

    /*
     * Récupère la liste des sociétés et affiche la liste dans un select pour suppression
     */

    public function selectDelDisplayCompanyFormAction($sujet) {
        $list = $this->model->listModel($sujet);
        $this->view->selectDelDisplayCompanyForm($list);
    }

    /*
     * Suppression d'une société et affichage d'un bouton "revenir à la sélection"
     */

    public function getParamDelSelectAction($sujet) {
        $list = $this->model->getParamDelSelect($sujet, $this->postParam);
        $this->view->companyDisplay();
    }

}

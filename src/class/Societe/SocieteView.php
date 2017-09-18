<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SocieteView
 *
 * @author Julie
 */
class SocieteView extends BaseView {
    /*
     * Affichage de la page "Mes sociétés" avec affichage de la liste des sociétés
     * @param $list
     */

    public function listDisplay($list) {
        $this->page .= '<div class="container button">'
                . '<div class="row button">'
                . '<div class="col-xs-12">';

        $this->page .= '<ul id="navButton" class="nav-justified">'
                . '<li role="presentation">'
                . '<a id="addCompany" href="index.php?controller=societe&action=addDisplayCompanyForm">Créer une nouvelle société</a>'
                . '</li>'
                . '<li role="presentation">'
                . '<a id="upCompany" href="index.php?controller=societe&action=selectUpDisplayCompanyForm">Modifier une fiche société</a>'
                . '</li>'
                . '<li role="presentation">'
                . '<a id="delCompany" href="index.php?controller=societe&action=selectDelDisplayCompanyForm">Supprimer une fiche société</a>'
                . '</li>'
                . '</ul>'
                . '</div>'
                . '</div>'
                . '</div>';

        $this->page .= '<div class="container companyList">'
                . '<div class="row companyList">'
                . '<div id="companyList" class="col-xs-12 companyList">'
                . '<h4>Liste de vos sociétés</h4>';

        $this->page .= '<table class="table table-striped table-bordered table-hover">'
                . '<tr>'//ouverture première ligne avec titres tableau
                . '<th>N°</th>'
                . '<th>Dénomination</th>'
                . '<th>Adresse</th>'
                . '<th>Code Postal</th>'
                . '<th>Ville</th>'
                . '<th>SIRET</th>'
                . '<th>Code NAF</th>'
                . '<th>Forme Juridique</th>'
                . '<th>Téléphone</th>'
                . '<th>Dirigeant</th>'
                . '<th>Statut</th>'
                . '<th>Commentaire</th>'
                . '<th>Modifier</th>'
                . '<th>Supprimer</th>'
                . '</tr>'//fermeture première ligne avec titres tableau
                . '<tr>'; //ouverture ligne contenu tableau
        //Récupération des données du tableau
        foreach ($list as $element) {
            foreach ($element as $case) {
                $case = utf8_decode($case);
                $this->page .= "<td>$case</td>";
            }
            $this->page .= "<td><a href=\"index.php?controller=societe&action=getParamSelect&id=$element[0]\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>"
                    . "<td><a href=\"index.php?controller=societe&action=delNow&id=$element[0]\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>"
                    . '</tr>'; //fermeture ligne contenu tableau
        }

        $this->page .= '</table>'
                . '</div>'; //fermeture companyList
        $this->page .= '</div>'//fermeture row company
                . '</div>'; //fermeture container company

        $this->display();
    }

    /*
     * Affiche le formulaire d'ajout de société
     */

    public function addDisplayCompanyForm() {
        $this->page .= '<div class="container company">'
                . '<div class="row company">'
                . '<div id="buttonCompany" class="col-xs-3 createButton">'
                . '<a href="index.php?controller=societe&action=list">Revenir à la liste des sociétés</a>'
                . '</div>'; //fermeture createButton
        $this->page .= $this->getHTMLContent(__DIR__ . '/../../html/forms/createForm.html');

        for ($i = 0; $i <= 10; $i++) {
            $this->page = str_replace("{parm$i}", "", $this->page);
        }

        $this->display();
    }

    /*
     * Récupération de la liste des sociétés pour affichage dans un select
     * @param $list liste complète de la table
     */

    public function selectUpDisplayCompanyForm($list) {
        $this->page .= '<div class="container company">'
                . '<div class="row company">'
                . '<div id="buttonCompany" class="col-xs-3 createButton">'
                . '<a href="index.php?controller=societe&action=list">Revenir à la liste des sociétés</a>'
                . '</div>'
                . '<div id="selectForm" class="container">'
                . '<div class="row">'
                . "<form id='selectForm' action='index.php?controller=societe&action=getParamSelect' method='POST'>"
                . '<div class="form-group">'
                . '<label for="select">Sélectionner la société que vous souhaitez modifer : </label>'
                . '<select id="optSelect" name="option" class="form-control">';

        $listSelect = "";
        foreach ($list as $element) {
            $this->page .= "<option value=\"{$element[0]}\">{$element[1]}</option>";
        }
        $this->page .= '</select>'
                . '</div>'
                . '<div class="form-group">'
                . '<input type="submit" class="form-control" id="validationButton" value="Valider votre sélection"/>'
                . '</div>'
                . '</form>'
                . '</div>'
                . '</div>';
        $this->display();
    }
    
    public function selectDelDisplayCompanyForm($list){
                $this->page .= '<div class="container company">'
                . '<div class="row company">'
                . '<div id="buttonCompany" class="col-xs-3 createButton">'
                . '<a href="index.php?controller=societe&action=list">Revenir à la liste des sociétés</a>'
                . '</div>'
                . '<div id="selectForm" class="container">'
                . '<div class="row">'
                . "<form id='selectForm' action='index.php?controller=societe&action=getParamDelSelect' method='POST'>"
                . '<div class="form-group">'
                . '<label for="select">Sélectionner la société que vous souhaitez supprimer : </label>'
                . '<select id="optSelect" name="option" class="form-control">';

        $listSelect = "";
        foreach ($list as $element) {
            $this->page .= "<option value=\"{$element[0]}\">{$element[1]}</option>";
        }
        $this->page .= '</select>'
                . '</div>'
                . '<div class="form-group">'
                . '<input type="submit" class="form-control" id="validationButton" value="Valider votre sélection"/>'
                . '</div>'
                . '</form>'
                . '</div>'
                . '</div>';
        $this->display();
    }

    /*
     * Affiche le formulaire de MAJ de société pré-rempli
     * @param $company la société sélectionnée
     */

    public function upDisplayCompanyForm($company) {
        $this->page .= '<div class="container company">'
                . '<div class="row company">'
                . '<div id="buttonCompany" class="col-xs-3 createButton">'
                . '<a href="index.php?controller=societe&action=selectUpDisplayCompanyForm">Revenir à la sélection</a>'
                . '</div>'; //fermeture createButton
        $this->page .= $this->getHTMLContent(__DIR__ . '/../../html/forms/upForm.html');
        for ($i = 0; $i <= 11; $i++) {
            $this->page = str_replace("{parm$i}", "$company[$i]", $this->page);
        }

        $this->display();
    }

       /*
        * Affiche le formulaire de MAJ vide
        */
    public function companyDisplay() {
        $this->page .= '<div class="container company">'
                . '<div class="row company">'
                . '<div id="buttonCompany" class="col-xs-3 createButton">'
                . '<a href="index.php?controller=societe&action=selectUpDisplayCompanyForm">Revenir à la sélection</a>'
                . '</div>'//fermeture createButton
                .'</div>'
                .'</div>';
        
        $this->display();
    }
   

}

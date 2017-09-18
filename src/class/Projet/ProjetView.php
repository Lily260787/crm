<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjetView
 *
 * @author Julie
 */
class ProjetView extends BaseView {
   
        public function listDisplay($list) {
        $this->page .= '<div class="container projet">'
                . '<div class="row projet">'
                . '<div id="createButton" class="col-xs-3 createButton">'
                . '<input type="button" id="buttonProjet" value="Créer un nouveau projet"/>'
                . '</div>'; //fermeture createButton

        $this->page .= '<div id="projetList" class="col-xs-6 projetList">'
                . '<h4>Liste de vos projets</h4>'
                . '<table class="table table-striped table-bordered table-hover">'
                . '<tr>'//ouverture première ligne avec titres tableau
                . '<th>N°</th>'
                . '<th>Intitulé</th>'
                . '<th>Société</th>'
                . '<th>Contact</th>'
                . '<th>Produit concerné</th>'
                . '<th>Date début</th>'
                . '<th>Date fin</th>'
                . '<th>Montant</th>'
                . '<th>Statut</th>'
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
            $this->page .= "<td><a href=\"index.php?controller=home&action=up&id=$element[0]\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>"
                    . "<td><a href=\"index.php?controller=home&action=delNow&id=$element[0]\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>"
                    . '</tr>'; //fermeture ligne contenu tableau
        }


        $this->page .= '</table>'
                . '</div>'; //fermeture projetList
        $this->page .= '<div id="selectType" class="col-xs-3 selectType">'
                . '<div class="form-group">'
                . '<label for="sel1">Trier par type :</label>'
                . '<select class="form-control">'
                . '<option selected="selected">Toutes</option>'
                . '<option>Prospects</option>'
                . '<option>Clients</option>'
                . '</select>'
                . '</div>'//fermeture selectType
                . '</div>'//fermeture row projet
                . '</div>'; //fermeture container projet

        $this->display();
    }
}

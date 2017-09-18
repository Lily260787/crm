<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RdvView
 *
 * @author Julie
 */
class RdvView extends BaseView{
    
            public function listDisplay($list) {
        $this->page .= '<div class="container rdv">'
                . '<div class="row rdv">'
                . '<div id="createButton" class="col-xs-3 createButton">'
                . '<input type="button" id="buttonRdv" value="Créer un nouveau rendez-vous"/>'
                . '</div>'; //fermeture createButton

        $this->page .= '<div id="rdvList" class="col-xs-6 rdvList">'
                . '<h4>Liste de vos rdvs</h4>'
                . '<table class="table table-striped table-bordered table-hover">'
                . '<tr>'//ouverture première ligne avec titres tableau
                . '<th>N°</th>'
                . '<th>Intitulé</th>'
                . '<th>Date</th>'
                . '<th>Soci&été</th>'
                . '<th>Contact</th>'
                . '<th>Produit</th>'
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
                . '</div>'; //fermeture rdvList
        $this->page .= '<div id="selectType" class="col-xs-3 selectType">'
                . '<div class="form-group">'
                . '<label for="sel1">Trier par type :</label>'
                . '<select class="form-control">'
                . '<option selected="selected">Toutes</option>'
                . '<option>Prospects</option>'
                . '<option>Clients</option>'
                . '</select>'
                . '</div>'//fermeture selectType
                . '</div>'//fermeture row rdv
                . '</div>'; //fermeture container rdv

        $this->display();
    }
}

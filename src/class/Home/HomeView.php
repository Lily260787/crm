<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeView
 *
 * @author Julie
 */
require_once __DIR__ . ('/../BaseView.php');

class HomeView extends BaseView {

    public function listRDVDisplay($list) {
        //Concaténation de mon intro
        $this->page .= '<div id="list" class="container list">'
                .'<h4>Bonjour {utilisateur} !</h4>'
                . '<div class="row list rdv">';

        //Rajout de ma page html listing
        $this->page .= '<div id="panel" class="panel panel-default">'
                . '<div class="panel-heading">Vous trouverez ci-dessous la liste des vos rendez-vous en cours :</div>'
                . '<table class="table table-striped table-bordered table-hover">'
                . '<tr>'
                . '<th>N°</th>'
                . '<th>Intitulé</th>'
                . '<th>Date du rdv</th>'
                . '<th>Société</th>'
                . '<th>Contact</th>'
                . '<th>Produit concerné</th>'
                . '<th>Statut</th>'
                . '<th>Modifier</th>'
                . '<th>Supprimer</th>'
                . '</tr>';
        //Récupération des données du tableau
        foreach ($list as $element) {
            foreach ($element as $case) {
                $case = utf8_decode($case);
                $this->page .= "<td>$case</td>";
            }
        }

        //Rajout des options modifier et supprimer
        $this->page .= "<td><a href=\"index.php?controller=home&action=up&id=$element[0]\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>"
                . "<td><a href=\"index.php?controller=home&action=delNow&id=$element[0]\"<span class=\"glyphicon glyphicon-trash\"></span></a></td>"
                . "</tr>";
        //Fermeture des balises
        $this->page .= '</table></div></div>';
       
    }

    public function listProjectDisplay($list) {
        $this->page .= '<div class="row list projet">'
                . '<div id="panel" class="panel panel-default">'
                . '<div class="panel-heading">Vous trouverez ci-dessous la liste des vos projets en cours :</div>'
                . '<table class="table table-striped table-bordered table-hover">'
                . '<tr>'
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
                . '</tr>';
        //Récupération des données du tableau
        foreach ($list as $element) {
            foreach ($element as $case) {
                $this->page .= "<td>$case</td>";
            }
        }
        //Rajout des options modifier et supprimer
        $this->page .= "<td><a href=\"index.php?controller=home&action=up&id=$element[0]\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>"
                . "<td><a href=\"index.php?controller=home&action=delNow&id=$element[0]\"<span class=\"glyphicon glyphicon-trash\"></span></a></td>"
                . "</tr>";
        
        $this->page .= '</table>'
                        .'</div>'
                        .'</div>';
       $this->display();
    }

}

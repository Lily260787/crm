<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author Julie
 */

class HomeController extends BaseController {
    
        public function listCurrentAction($rdv, $project){
           $listRDV = $this->model->currentObjectList($rdv);
           $listProject = $this->model->currentObjectList($project);
           $this->view->listRDVDisplay($listRDV);
           $this->view->listProjectDisplay($listProject);
           
    }

}

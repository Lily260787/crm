<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjetController
 *
 * @author Julie
 */
class ProjetController extends BaseController {
    
        public function listAction($sujet){
        $list = $this->model->listModel($sujet);
        $this->view->listDisplay($list);
    }
}

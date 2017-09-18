<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseView
 *
 * @author Julie
 */
class BaseView {

    protected $page;

    public function __construct() {
        $this->page = $this->getHTMLContent(__DIR__ . '/../html/content/header.html');
        $this->page .= $this->getHTMLContent(__DIR__ . '/../html/content/nav.html');
    }

    public function getHTMLContent($file) {
        return file_get_contents($file);
    }

    public function display() {
        $this->page .= $this->getHTMLContent("../src/html/content/footer.html");
        echo $this->page;
    }

    /*public function replaceTag($paramaters) {
        $tags = array('listSelect', 'parm0', 'parm1', 'parm2', 'parm3', 'parm4', 'parm5', 'parm6', 'option');
        foreach ($tags as $tag) {
            if (array_key_exists($tag, $paramaters)) {
                $this->page = str_replace("{{$tag}}", $paramaters[$tag], $this->page);
            }
        }
        echo $this->display();
    }*/


    
        /*
     * Fonction affiche un résultat positif
     * @param $sujet qui est soit prospect soit client et $action qui peut être supprimé, ajouté, mis à jour
     */

    function displaySuccess($sujet, $action) {
        $trueHTML = $this->getHTML(__DIR__ . '/../../html/success.html');
        $trueHTML = str_replace('{sujet}', $sujet, $trueHTML);
        $trueHTML = str_replace('{action}', $action, $trueHTML);
        $this->page .= $trueHTML;
    }

    function displayFail($sujet, $action) {
        $trueHTML = $this->getHTML(__DIR__ . '/../../html/fail.html');
        $trueHTML = str_replace('{sujet}', $sujet, $trueHTML);
        $trueHTML = str_replace('{action}', $action, $trueHTML);
        $this->page .= $trueHTML;
    }

}

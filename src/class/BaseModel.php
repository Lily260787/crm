<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseModel
 *
 * @author Julie
 */
class BaseModel {

    public $connexion;
    private $request;

    public function __construct() {
        try {
            $this->connexion = new PDO('mysql:host=' . SERVER . ';dbname=' . BASE, USER, PASSWORD);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    /*
     * Fonction qui récupère la liste complète de ma table
     * @return $list array sous forme num
     */

    public function listModel($sujet) {
        $request = "SELECT * FROM $sujet order by id$sujet";
        $result = $this->connexion->query($request);
        $list = null;
        if ($result) {
            $list = $result->fetchAll(PDO::FETCH_NUM);
        }
        return $list;
    }

    /*
     * Fonction qui récupère les objets dont le statut est "en cours"
     * @return array sous forme num
     */

    public function currentObjectList($object) {
        $request = "SELECT * FROM $object WHERE statut='en cours'";
        $result = $this->connexion->query($request);
        $list = null;
        if ($result) {
            $list = $result->fetchAll(PDO::FETCH_NUM);
        }
        return $list;
    }

    /*
     * Ajout dans un item dans la base
     * @param $sujet (société, contact...) et $postParam
     */

    public function add($sujet, $postParam) {
        $this->request = "INSERT INTO $sujet (denomination, adresse, codePostal, ville, SIRET, code_NAF, forme_juridique, tel, dirigeant, statut, commentaire) VALUES (:parm0, :parm1, :parm2, :parm3, :parm4, :parm5, :parm6, :parm7, :parm8, :parm9, :parm10)";
        $this->request = $this->connexion->prepare($this->request);
        for ($i = 0; $i <= 10; $i++) {
            $this->request->bindParam(":parm$i", $postParam["parm$i"]);
        }
        return $this->testAndExecute();
    }

    /*
     * Mise à jour d'un item dans la base
     * @param $sujet (société, contact...) et $postParam 
     */

    public function up($sujet, $postParam) {
        $this->request = "UPDATE $sujet SET denomination=:parm1, adresse=:parm2, codePostal=:parm3, ville=:parm4, SIRET=:parm5, code_NAF=:parm6, forme_juridique=:parm7, tel=:parm8, dirigeant=:parm9, statut=:parm10, commentaire=:parm11 WHERE id$sujet=:parm0";
        $this->request = $this->connexion->prepare($this->request);
        for ($i = 0; $i <= 11; $i++) {
            $this->request->bindParam(":parm$i", $postParam["parm$i"]);
        }
        return $this->testAndExecute();
    }

    /*
     * Récupération des infos de la en fonction l'id sélectionné
     */

    public function getParamSelect($sujet, $postParam, $getParam) {
        if ($postParam) {
            $this->request = "SELECT * FROM $sujet WHERE id$sujet = :id";
            $this->request = $this->connexion->prepare($this->request);
            $this->request->bindParam(":id", $postParam['option']);
            $this->testAndExecute();
            $list = $this->request->fetchAll(PDO::FETCH_NUM);
            if (!empty($list)) {
                return $list[0];
            }
            return $list;
           
        } else if($getParam){
            $this->request = "SELECT * FROM $sujet WHERE id$sujet = :id";
            $this->request = $this->connexion->prepare($this->request);
            $this->request->bindParam(":id", $getParam['id']);
            $this->testAndExecute();
            $list = $this->request->fetchAll(PDO::FETCH_NUM);
            if (!empty($list)) {
                return $list[0];
            }
            return $list;
        }
        
    }

    /*
     * Suppression en fonction de l'id sélectionné
     */

    public function getParamDelSelect($sujet, $postParam) {
        $this->request = "DELETE FROM $sujet WHERE id$sujet = :id";
        $this->request = $this->connexion->prepare($this->request);
        $this->request->bindParam(":id", $postParam['option']);
        $this->testAndExecute();
    }

    /*
     * Exécution de la requête et test
     */

    public function testAndExecute() {
        if (!$this->request->execute()) {
            //return "false";
            die('Erreur : ' . $this->request->errorInfo()[2]);
        } else {
            return "true";
        }
    }

}

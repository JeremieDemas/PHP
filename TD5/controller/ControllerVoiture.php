<?php

require_once File::build_path(array("model","ModelVoiture.php")); // chargement du modèle

class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        require File::build_path(array("view","voiture","list.php"));  //"redirige" vers la vue
    }

    public static function read() {
    	$immat=$_GET["immat"];
    	$v=ModelVoiture::getVoitureByImmat("$immat");
    	if(empty($v)) {
    		require File::build_path(array("view","voiture","error.php"));
    	}
    	else {
    		require File::build_path(array("view","voiture","detail.php"));
    	}
    }

    public static function create() {
    	require File::build_path(array("view","voiture","create.php"));
    } 

    public static function created() {
    	$voit=new ModelVoiture($_POST["marque"],$_POST["couleur"],$_POST["immatriculation"]);
    	$voit->save();
    	self::readAll();
    }

    public static function delete() {
        $immat=$_GET["immat"];
        ModelVoiture::deleteVoiture($immat);
        self::readAll();
    }
}
?>
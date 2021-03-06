<?php

require_once File::build_path(array("model","ModelVoiture.php")); // chargement du modèle

class ControllerVoiture {
    public static function readAll() {
    	$controller='voiture';
    	$view='list';
    	$pagetitle='Liste des voitures';
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        require File::build_path(array("view","view.php"));  //"redirige" vers la vue
    }

    public static function read() {
    	$immat=$_GET["immat"];
    	$v=ModelVoiture::getVoitureByImmat("$immat");
    	if(empty($v)) {
    		$controller='voiture';
    		$view='error';
    		$pagetitle='Erreur 404';
    		require File::build_path(array("view","view.php"));
    	}
    	else {
    		$controller='voiture';
    		$view='detail';
    		$pagetitle='Liste détaillée des voitures';
    		require File::build_path(array("view","view.php"));
    	}
    }

    public static function create() {
    	require File::build_path(array("view","voiture","create.php"));
    } 

    public static function created() {
        $controller='voiture';
        $view='created';
        $pagetitle='Voiture créée avec succès';
    	$voit=new ModelVoiture($_POST["marque"],$_POST["couleur"],$_POST["immatriculation"]);
    	$voit->save();
        $tab_v=array($voit);
        require File::build_path(array("view","view.php"));
    }

    public static function delete() {
        $immat=$_GET["immat"];
        ModelVoiture::deleteVoiture($immat);
        self::readAll();
    }
}
?>
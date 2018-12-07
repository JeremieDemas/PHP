<?php

require_once File::build_path(array("model","ModelTrajet.php")); // chargement du modèle

class ControllerTrajet {

    protected static $object="trajet";

    public static function readAll() {
    	$controller='trajet';
    	$view='list';
    	$pagetitle='Liste des trajets';
        $tab_t = ModelTrajet::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view","view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $t=ModelTrajet::select($_GET["id"]);
    	if(empty($t)) {
            $controller="trajet";
    		$view='error';
    		$pagetitle='Erreur 404';
    		require File::build_path(array("view","view.php"));
    	}
    	else {
            $controller="trajet";
    		$view='detail';
    		$pagetitle='Liste détaillée des trajets';
    		require File::build_path(array("view","view.php"));
    	}
    }

    public static function create() {
    	$action="created";
    	$mode="required";
    	$t = new ModelTrajet();
    	require File::build_path(array("view","trajet","update.php"));
    } 

    public static function created() {
        $controller='trajet';
        $view='created';
        $pagetitle='Trajet créé avec succès';
    	$trajet=array("id"=>$_POST["id"],"depart"=>$_POST["depart"],"arrivee"=>$_POST["arrivee"],"date"=>$_POST["date"],"nbplaces"=>$_POST["nbplaces"],"prix"=>$_POST["prix"],"conducteur_login"=>$_POST["conducteur_login"]);
    	ModelTrajet::save($trajet);
        $tab_t=ModelTrajet::selectAll();
        require File::build_path(array("view","view.php"));
    }

    public static function delete() {
        $controller='trajet';
        $view='deleted';
        $pagetitle='Trajet supprimé avec succès';
        $id=$_GET["id"];
        $t=ModelTrajet::getTrajetById("$id");
        ModelTrajet::delete($id);
        require File::build_path(array("view","view.php"));
        self::readAll();
    }

    public static function error() {
        $controller='trajet';
        $view='error';
        $pagetitle='Erreur 404';
        require File::build_path(array("view","view.php"));
    }

    public static function update() {
    	$action="updated";
    	$mode="readonly";
        $controller='trajet';
        $view='update';
        $pagetitle='Mise à jour du trajet en cours';
        $t=ModelTrajet::select($_GET['id']);
        require File::build_path(array("view","view.php"));
    }

    public static function updated() {
        $controller='trajet';
        $view='updated';
        $pagetitle='Mise à jour du trajet avec succès';
        $t=array(
            "id"=>$_POST["id"],
            "depart"=>$_POST["depart"],
            "arrivee"=>$_POST["arrivee"],
            "date"=>$_POST["date"],
            "nbplaces"=>$_POST["nbplaces"],
            "prix"=>$_POST["prix"],
            "conducteur_login"=>$_POST["conducteur_login"],
        );
        ModelTrajet::update($t);
        $tab_t=array();
        require File::build_path(array("view","view.php"));
    }
}
?>
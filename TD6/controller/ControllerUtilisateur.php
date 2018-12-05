<?php

require_once File::build_path(array("model","ModelUtilisateur.php")); // chargement du modèle

class ControllerUtilisateur {

	protected static $object="utilisateur";

    public static function readAll() {
    	$controller='utilisateur';
    	$view='list';
    	$pagetitle='Liste des utilisateurs';
        $tab_utilisateur = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view","view.php"));  //"redirige" vers la vue
    }

    public static function read() {
        $u=ModelUtilisateur::select($_GET["login"]);
    	if(empty($u)) {
            $controller="utilisateur";
    		$view='error';
    		$pagetitle='Erreur 404';
    		require File::build_path(array("view","view.php"));
    	}
    	else {
            $controller="utilisateur";
    		$view='detail';
    		$pagetitle='Liste détaillée des utilisateurs';
    		require File::build_path(array("view","view.php"));
    	}
    }

}

?>
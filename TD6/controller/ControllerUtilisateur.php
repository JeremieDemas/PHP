<?php

require_once File::build_path(array("model","ModelUtilisateur.php")); // chargement du modèle

class ControllerUtilisateur {
    public static function readAll() {
    	$controller='utilisateur';
    	$view='list';
    	$pagetitle='Liste des utilisateurs';
        $tab_utilisateur = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        require File::build_path(array("view","view.php"));  //"redirige" vers la vue
    }
}

?>
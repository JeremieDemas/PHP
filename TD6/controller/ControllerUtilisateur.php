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

    public static function delete() {
        $controller='utilisateur';
        $view='deleted';
        $pagetitle='Utilisateur supprimé avec succès';
        $login=$_GET["login"];
        $u=ModelUtilisateur::getUtilisateurByLogin("$login");
        ModelUtilisateur::delete($login);
        require File::build_path(array("view","view.php"));
        self::readAll();
    }

    public static function create() {
        $action="created";
        $mode="required";
        $u = new ModelUtilisateur();
        require File::build_path(array("view","utilisateur","update.php"));
    } 

    public static function created() {
        $controller='utilisateur';
        $view='created';
        $pagetitle='Utilisateur créé avec succès';
        $utilisateur=array("login"=>$_POST["login"],"nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"]);
        ModelUtilisateur::save($utilisateur);
        $tab_utilisateur=ModelUtilisateur::selectAll();
        require File::build_path(array("view","view.php"));
    }

    public static function update() {
        $action="updated";
        $mode="readonly";
        $controller='utilisateur';
        $view='update';
        $pagetitle="Mise à jour de l'utilisateur en cours";
        $u=ModelUtilisateur::select($_GET['login']);
        require File::build_path(array("view","view.php"));
    }

    public static function updated() {
        $controller='utilisateur';
        $view='updated';
        $pagetitle="Mise à jour de l'utilisateur avec succès";
        $u=array(
            "login"=>$_POST["login"],
            "nom"=>$_POST["nom"],
            "prenom"=>$_POST["prenom"],
        );
        ModelUtilisateur::update($u);
        $tab_utilisateur=array();
        require File::build_path(array("view","view.php"));
    }

}

?>
<?php

require_once File::build_path(array("model","ModelUtilisateur.php")); // chargement du modèle
require_once File::build_path(array("lib","Security.php"));
require_once File::build_path(array("lib","Session.php"));

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
        if ($_POST["mdp"]==$_POST["mdpc"]) {
            $utilisateur=array("login"=>$_POST["login"],"nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"],"mdp"=>Security::chiffrer($_POST["mdp"]));
            ModelUtilisateur::save($utilisateur);
            $tab_utilisateur=ModelUtilisateur::selectAll();
            require File::build_path(array("view","view.php"));
        }
        else {
            $controller="utilisateur";
            $view='error';
            $pagetitle='Erreur 404';
            require File::build_path(array("view","view.php"));
        }
    }

    public static function update() {
    	if(isset($_SESSION["login"]) && Session::is_user($_SESSION["login"])) {
	        $action="updated";
	        $mode="readonly";
	        $controller='utilisateur';
	        $view='update';
	        $pagetitle="Mise à jour de l'utilisateur en cours";
	        $u=ModelUtilisateur::select($_GET['login']);
	        require File::build_path(array("view","view.php"));
   		}
        else {
	    	$action="connected";
	        $controller='utilisateur';
	        $view='connect';
	        $pagetitle="Connexion de l'utilisateur en cours";
	        require File::build_path(array("view","view.php"));
	    }
    }

    public static function updated() {
        $controller='utilisateur';
        $view='updated';
        $pagetitle="Mise à jour de l'utilisateur avec succès";
	    if ($_POST["mdp"]==$_POST["mdpc"]) {
	        $u=array("login"=>$_POST["login"], "nom"=>$_POST["nom"], "prenom"=>$_POST["prenom"], "mdp"=>Security::chiffrer($_POST["mdp"]));
            ModelUtilisateur::update($u);
	        $tab_utilisateur=array();
	        require File::build_path(array("view","view.php"));
	    }
        else {
            $controller="utilisateur";
            $view='error';
            $pagetitle='Erreur 404';
            require File::build_path(array("view","view.php"));
        }
    }

    public static function connect() {
        $action="connected";
        $controller='utilisateur';
        $view='connect';
        $pagetitle="Connexion de l'utilisateur en cours";
        require File::build_path(array("view","view.php"));
    }

    public static function connected() {
        $controller='utilisateur';
        $view='connected';
        $pagetitle="Connexion de l'utilisateur avec succès";
        $res=ModelUtilisateur::checkPassword($_POST["login"],Security::chiffrer($_POST["mdp"]));
        if ($res) {
            $_SESSION["login"]=$_POST["login"];
            $_SESSION["mdp"]=$_POST["mdp"];
            $u=ModelUtilisateur::select($_SESSION["login"]);
            $controller="utilisateur";
            $view='detail';
            $pagetitle='Liste détaillée des utilisateurs';
            require File::build_path(array("view","view.php"));
        }
        else {
            $controller="utilisateur";
            $view='error';
            $pagetitle='Erreur 404';
            require File::build_path(array("view","view.php"));
        }
    }

    public static function deconnect() {
        session_unset();
        session_destroy();
        setcookie(session_name(), "", time()-1);
        header("Location: index.php");
        require File::build_path(array("index.php"));
    }

}

?>
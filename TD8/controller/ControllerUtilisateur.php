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
    	if(isset($_SESSION["login"]) && Session::is_user($_SESSION["login"])) {
	        $controller='utilisateur';
	        $view='deleted';
	        $pagetitle='Utilisateur supprimé avec succès';
	        $login=$_GET["login"];
	        $u=ModelUtilisateur::getUtilisateurByLogin("$login");
	        ModelUtilisateur::delete($login);
	        require File::build_path(array("view","view.php"));
	        self::readAll();
	    }
	    else {
	    	$action="connected";
	        $controller='utilisateur';
	        $view='connect';
	        $pagetitle="Connexion de l'utilisateur en cours";
	        require File::build_path(array("view","view.php"));
	    }
    }

    public static function create() {
        $action="created";
        $view="update";
        $mode="required";
        $pagetitle="Création d'un utilisateur";
        $u = new ModelUtilisateur();
        require File::build_path(array("view","view.php"));
    } 

    public static function created() {
        $controller='utilisateur';
        $view='created';
        $pagetitle='Utilisateur créé avec succès';
        if(isset($_SESSION["login"]) && Session::is_admin($_SESSION["login"])) {
	        if ($_POST["mdp"]==$_POST["mdpc"] && empty($_POST["admin"])) {
	            $utilisateur=array("login"=>$_POST["login"],"nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"],"mdp"=>Security::chiffrer($_POST["mdp"]), "email"=>$_POST["email"], "admin"=>0);
	            ModelUtilisateur::save($utilisateur);
	            $tab_utilisateur=ModelUtilisateur::selectAll();
	            require File::build_path(array("view","view.php"));
	        }
	        else {
	            $utilisateur=array("login"=>$_POST["login"],"nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"],"mdp"=>Security::chiffrer($_POST["mdp"]), "email"=>$_POST["email"],"admin"=>1);
	            ModelUtilisateur::save($utilisateur);
	            $tab_utilisateur=ModelUtilisateur::selectAll();
	            require File::build_path(array("view","view.php"));
	        }
	    }
	    else if(isset($_SESSION["login"]) && Session::is_user($_SESSION["login"]) && $_GET["login"]==$_SESSION["login"]) {
	    	if ($_POST["mdp"]==$_POST["mdpc"] && empty($_POST["admin"])) {
	            $utilisateur=array("login"=>$_POST["login"],"nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"],"mdp"=>Security::chiffrer($_POST["mdp"]), "email"=>$_POST["email"], "admin"=>0);
	            ModelUtilisateur::save($utilisateur);
	            $tab_utilisateur=ModelUtilisateur::selectAll();
	            require File::build_path(array("view","view.php"));
	        }
	        else {
	            $utilisateur=array("login"=>$_POST["login"],"nom"=>$_POST["nom"],"prenom"=>$_POST["prenom"],"mdp"=>Security::chiffrer($_POST["mdp"]), "email"=>$_POST["email"], "admin"=>1);
	            ModelUtilisateur::save($utilisateur);
	            $tab_utilisateur=ModelUtilisateur::selectAll();
	            require File::build_path(array("view","view.php"));
	        }
	    }
        else {
            $controller="utilisateur";
            $view='error';
            $pagetitle='Erreur 404';
            require File::build_path(array("view","view.php"));
        }
    }

    public static function update() {
    	if(isset($_SESSION["login"]) && Session::is_admin($_SESSION["login"])) {
	        $action="updated";
	        $mode="readonly";
	        $controller='utilisateur';
	        $view='update';
	        $pagetitle="Mise à jour de l'utilisateur en cours";
	        $u=ModelUtilisateur::select($_GET['login']);
	        require File::build_path(array("view","view.php"));
   		}
    	else if(isset($_SESSION["login"]) && Session::is_user($_SESSION["login"]) && $_GET["login"]==$_SESSION["login"]) {
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
    	if(isset($_SESSION["login"]) && Session::is_user($_SESSION["login"])) {
	        $controller='utilisateur';
	        $view='updated';
	        $pagetitle="Mise à jour de l'utilisateur avec succès";
	        if ($_POST["mdp"]==$_POST["mdpc"] && empty($_POST["admin"])) {
		        $u=array("login"=>$_POST["login"], "nom"=>$_POST["nom"], "prenom"=>$_POST["prenom"], "mdp"=>Security::chiffrer($_POST["mdp"]), "admin"=>0, "email"=>$_POST["email"]);
	            ModelUtilisateur::update($u);
		        $tab_utilisateur=array();
		        require File::build_path(array("view","view.php"));
		    }
		    else if ($_POST["mdp"]==$_POST["mdpc"] && isset($_POST["admin"])) {
		        $u=array("login"=>$_POST["login"], "nom"=>$_POST["nom"], "prenom"=>$_POST["prenom"], "mdp"=>Security::chiffrer($_POST["mdp"]), "admin"=>1, "email"=>$_POST["email"]);
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
	    else {
	    	$action="connected";
	        $controller='utilisateur';
	        $view='connect';
	        $pagetitle="Connexion de l'utilisateur en cours";
	        require File::build_path(array("view","view.php"));
	    }
    }

    public static function connect() {
    	if(ModelUtilisateur::select($_SESSION["login"])->nonce==null) {
	        $action="connected";
	        $controller='utilisateur';
	        $view='connect';
	        $pagetitle="Connexion de l'utilisateur en cours";
	        require File::build_path(array("view","view.php"));
    	else {
    		$controller="utilisateur";
            $view='error';
            $pagetitle='Erreur 404';
            require File::build_path(array("view","view.php"));
    	}
    }

    public static function connected() {
        $controller='utilisateur';
        $view='connected';
        $pagetitle="Connexion de l'utilisateur avec succès";
        $u=ModelUtilisateur::select($_POST["login"]);
        $res=ModelUtilisateur::checkPassword($_POST["login"],Security::chiffrer($_POST["mdp"]));
        if ($res) {
        	if($u[0]->get("admin")==1) {
        		$_SESSION['admin'] = true;
	            $_SESSION["login"]=$_POST["login"];
	            $_SESSION["mdp"]=$_POST["mdp"];
	            $u=ModelUtilisateur::select($_SESSION["login"]);
	            $controller="utilisateur";
	            $view='detail';
	            $pagetitle='Liste détaillée des utilisateurs';
	            require File::build_path(array("view","view.php"));
	        }
	        else {
	        	$_SESSION['admin'] = false;
	        	$_SESSION["login"]=$_POST["login"];
	            $_SESSION["mdp"]=$_POST["mdp"];
	            $u=ModelUtilisateur::select($_SESSION["login"]);
	            $controller="utilisateur";
	            $view='detail';
	            $pagetitle='Liste détaillée des utilisateurs';
	            require File::build_path(array("view","view.php"));
	        }
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
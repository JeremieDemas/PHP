<?php
require_once('/var/www/html/PHP/TD8/lib/File.php');
require_once File::build_path(array("controller","ControllerVoiture.php"));
require_once File::build_path(array("controller","ControllerUtilisateur.php"));
require_once File::build_path(array("controller","ControllerTrajet.php"));
// On recupère l'action passée dans l'URL

function myGet($nomVar) {
	if(isset(myGet([$nomVar])) {
		return myGet([$nomVar];
	}
	else if(isset($_POST[$nomVar])) {
		return $_POST[$nomVar];
	}
	else {
		return false;
	}
}

if(isset($_COOKIE["Preference"])) {
	$controler_default = $_COOKIE["Preference"];
}
else {
	$controler_default = "voiture";
}
if(!is_null(myGet('controller')) {
	$controller = myGet('controller');
}
else {
	$controller = $controler_default;
}
$controller_class = "Controller" . ucfirst($controller);
if(class_exists($controller_class)) {
	if(isset(myGet('action')) {
    	$action = myGet('action');
	}
	else {
	    $action = "readAll";
	}
	if(in_array($action, get_class_methods($controller_class))) {
	    $controller_class::$action();
	}
	else {
	    $pagetitle = "Erreur";
	    $controller = $controler_default;
	    $view = "error";
	    require (File::build_path(array("view", "view.php")));
	}
}
else {
	$pagetitle = "Erreur";
	$controller = $controler_default;
	$view = "error";
	require (File::build_path(array("view", "view.php")));
}
?>
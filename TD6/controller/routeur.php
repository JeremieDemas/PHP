<?php
require_once('/var/www/html/PHP/TD6/lib/File.php');
require_once File::build_path(array("controller","ControllerVoiture.php"));
require_once File::build_path(array("controller","ControllerUtilisateur.php"));
require_once File::build_path(array("controller","ControllerTrajet.php"));
// On recupère l'action passée dans l'URL

if(isset($_GET['controller'])) {
	$controller = $_GET['controller'];
}
else {
	$controller = "voiture";
}

$controller_class="Controller".ucfirst($controller);

if(!isset($_GET["action"])) {
	$_GET["action"] = "readAll";		
}

if(!in_array($_GET["action"],get_class_methods("$controller_class"))) {
	$_GET["action"] = "error";
}

$action = $_GET["action"];

if(class_exists("$controller_class")) {
	$action=$_GET["action"];
}
else {
	$action="error";
}
// Appel de la méthode statique $action de ControllerVoiture
$controller_class::$action(); 
?>
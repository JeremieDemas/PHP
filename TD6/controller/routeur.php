<?php
require_once('/var/www/html/PHP/TD6/lib/File.php');
require_once File::build_path(array("controller","ControllerVoiture.php"));
// On recupère l'action passée dans l'URL
if(!isset($_GET["action"])) {
	$_GET["action"] = "readAll";		
}
$action = $_GET["action"];
// Appel de la méthode statique $action de ControllerVoiture
ControllerVoiture::$action(); 
?>
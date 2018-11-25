<?php

require_once('Model.php');
require_once('Utilisateur.php');
require_once('Trajet.php');

$login=$_GET["login"];
$tab=Utilisateur::findTrajets($login);
foreach ($tab as $key => $value) {
	$value->afficher();
}

?>
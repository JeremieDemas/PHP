<?php

require_once('Trajet.php');
require_once('Utilisateur.php');

$id=$_GET["id"];
$tab=Trajet::findPassagers($id);
foreach ($tab as $key => $value) {
	$value->afficher();
}

?>
<?php

require_once('Model.php');

$rep=Model::$pdo->query("SELECT * FROM voiture");
$tab_obj = $rep->fetchAll(PDO::FETCH_OBJ);
foreach ($tab_obj as $key => $value) {
	echo "<p> Voiture $value->immatriculation de marque $value->marque (couleur $value->couleur) </p>";
}

?>
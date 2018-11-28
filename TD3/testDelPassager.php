<?php

require_once('Model.php');
require_once('Trajet.php');

$data['trajet_id']=$_GET["id_trajet"];
$data['utilisateur_login']=$_GET["login_utilisateur"];
Trajet::deletePassager($data);

?>
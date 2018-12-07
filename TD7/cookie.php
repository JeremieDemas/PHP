<?php

$tab=serialize(array("1","2","3"));
setcookie("Tab","$tab",time()+3600);
$res=$_COOKIE["Tab"];
foreach (unserialize($res) as $key => $value) {
	echo $value;
}
//setcookie("Test","Salut",time()-1);

?>
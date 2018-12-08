<?php

session_start();
$_SESSION["login"]="demasj";
$_SESSION["password"]=1234;
unset($_SESSION['admin']);
foreach ($_SESSION as $key => $value) {
	echo "<p> $key => $value </p>";
}
session_unset();
session_destroy();
setcookie(session_name(),'',time()-1);

?>
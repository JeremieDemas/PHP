<?php

foreach ($tab_utilisateur as $u) {
	echo "<p> Utilisateur de login ".$u->get("login").".</p>";
}

?>
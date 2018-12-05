<?php

foreach ($tab_utilisateur as $u) {
	echo '<p> Utilisateur de login ' . "<a href=?action=read&login=".rawurlencode($u->get("login")).">".htmlspecialchars($u->get("login")).'</a>' . '</p>';
}

?>
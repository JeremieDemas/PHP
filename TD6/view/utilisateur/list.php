<?php

foreach ($tab_utilisateur as $u) {
	echo '<p> Utilisateur de login ' . "<a href=?action=read&login=".rawurlencode($u->get("login"))."&controller=utilisateur>".htmlspecialchars($u->get("login")).'</a>. ' . 'Pour supprimer cet utilisateur cliquez' ."<a href=?action=delete&login=".rawurlencode($u->get("login")).'&controller=utilisateur>ici</a></p>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
    	<header>
          <nav style="border: 1px solid black;text-align:center;padding:1%;">
            <a href="index.php?action=readAll&controller=voiture">Les Voitures</a>
            <a href="index.php?action=readAll&controller=utilisateur">Les Utilisateurs</a>
            <a href="index.php?action=readAll&controller=trajet">Les Trajets</a>
            <a href="config/preference.html">Préférences</a>
            <?php
            require_once File::build_path(array("model","ModelUtilisateur.php"));
            if(isset($_SESSION)) {
                if(!isset($_SESSION["login"])) {
                    echo '<a href="index.php?action=connect&controller=utilisateur">Connexion</a>';
                }
                else {
                    echo '<a href="index.php?action=deconnect&controller=utilisateur">Déconnexion</a>';
                }
            }
            else {
                $controller="utilisateur";
                $view='error';
                $pagetitle='Erreur 404';
                require File::build_path(array("view","view.php"));
            }
            ?>
          </nav>
        </header>
		<?php
		// Si $controleur='voiture' et $view='list',
		// alors $filepath="/chemin_du_site/view/voiture/list.php"
		$filepath = File::build_path(array("view", static::$object, "$view.php"));
		require $filepath;
		?>
    </body>
    <footer>
    	<p style="border: 1px solid black;text-align:right;padding-right:1em;"> Site de covoiturage de Jérémie Demas </p>
    </footer>
</html>
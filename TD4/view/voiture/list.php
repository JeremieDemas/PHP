<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php
        foreach ($tab_v as $v)
            echo '<p> Voiture d\'immatriculation ' . "<a href=?action=read&immat=".$v->getImmatriculation().">".$v->getImmatriculation().'</a>' . '. Pour supprimer cette voiture cliquez' ."<a href=?action=delete&immat=".$v->getImmatriculation().'>ici</a></p>';
        ?>
    </body>
</html>
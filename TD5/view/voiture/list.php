<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php
        foreach ($tab_v as $v)
            echo '<p> Voiture d\'immatriculation ' . "<a href=?action=read&immat=".rawurlencode($v->getImmatriculation()).">".htmlspecialchars($v->getImmatriculation()).'</a>' . '. Pour supprimer cette voiture cliquez' ."<a href=?action=delete&immat=".rawurlencode($v->getImmatriculation()).'>ici</a></p>';
        ?>
    </body>
</html>
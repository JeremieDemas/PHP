<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste détaillée des voitures</title>
    </head>
    <body>
        <?php

        foreach ($v as $value) {
            echo "<p> Voiture ".$value->getImmatriculation()." de marque ".$value->getMarque()." (couleur ".$value->getImmatriculation()."). </p>";
        }
        
        ?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste détaillée des voitures</title>
    </head>
    <body>
        <?php

        foreach ($v as $value) {
            echo "<p> Voiture ".htmlspecialchars($value->getImmatriculation())." de marque ".htmlspecialchars($value->getMarque())." (couleur ".htmlspecialchars($value->getCouleur())."). </p>";
        }
        
        ?>
    </body>
</html>
        <?php

        foreach ($v as $value) {
            echo "<p> Voiture ".htmlspecialchars($value->getImmatriculation())." de marque ".htmlspecialchars($value->getMarque())." (couleur ".htmlspecialchars($value->getCouleur())."). </p>";
        }
        
        ?>
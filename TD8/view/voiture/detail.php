        <?php

        foreach ($v as $value) {
            echo "<p> Voiture ".htmlspecialchars($value->getImmatriculation())." de marque ".htmlspecialchars($value->getMarque())." (couleur ".htmlspecialchars($value->getCouleur())."). </p>";
            echo "Pour supprimer cette voiture cliquez "."<a href=?action=delete&immatriculation=".rawurlencode($value->getImmatriculation()).">ici.</a></p>";
            echo "Pour mettre à jour cette voiture cliquez "."<a href=?action=update&immatriculation=".rawurlencode($value->getImmatriculation()).">ici</a></p>";
        }
        
        ?>
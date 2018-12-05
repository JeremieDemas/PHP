        <?php

        foreach ($u as $value) {
            echo "<p> Utilisateur ".htmlspecialchars($value->get("prenom"))." ".htmlspecialchars($value->get("nom"))." de login ".htmlspecialchars($value->get("login")).". </p>";
            echo "Pour supprimer cette voiture cliquez "."<a href=?action=delete&immatriculation=".rawurlencode($value->getImmatriculation()).">ici.</a></p>";
            echo "Pour mettre à jour cette voiture cliquez "."<a href=?action=update&immatriculation=".rawurlencode($value->getImmatriculation()).">ici</a></p>";
        }
        
        ?>
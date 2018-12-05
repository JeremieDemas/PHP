        <?php

        foreach ($u as $value) {
            echo "<p> Utilisateur ".htmlspecialchars($value->get("prenom"))." ".htmlspecialchars($value->get("nom"))." de login ".htmlspecialchars($value->get("login")).". </p>";
        }
        
        ?>
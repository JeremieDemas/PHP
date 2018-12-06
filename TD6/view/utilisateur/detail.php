        <?php

        foreach ($u as $value) {
            echo "<p> Utilisateur ".htmlspecialchars($value->get("prenom"))." ".htmlspecialchars($value->get("nom"))." de login ".htmlspecialchars($value->get("login")).". </p>";
            echo "Pour supprimer cet utilisateur cliquez "."<a href=?action=delete&controller=utilisateur&login=".rawurlencode($value->get("login")).">ici.</a></p>";
            echo "Pour mettre à jour cet utilisateur cliquez "."<a href=?action=update&controller=utilisateur&login=".rawurlencode($value->get("login")).">ici</a></p>";
        }
        
        ?>
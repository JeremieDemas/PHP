        <?php

        foreach ($t as $value) {
            echo "<p> Trajet ".htmlspecialchars($value->get("id"))." effectué par le conducteur ".htmlspecialchars($value->get("conducteur_login"))." au départ de ".htmlspecialchars($value->get("depart"))." et à l'arrivée à ".htmlspecialchars($value->get("arrivee"))." le ".htmlspecialchars($value->get("date"))." possède ".htmlspecialchars($value->get("nbplaces"))." places à ".htmlspecialchars($value->get("prix"))." € l'unité.</p>";
            echo "Pour supprimer cet trajet cliquez "."<a href=?action=delete&controller=trajet&id=".rawurlencode($value->get("id")).">ici.</a></p>";
            echo "Pour mettre à jour cet trajet cliquez "."<a href=?action=update&controller=trajet&id=".rawurlencode($value->get("id")).">ici</a></p>";
        }
        
        ?>
        <?php
        foreach ($tab_t as $t)
            echo '<p> Trajet d\'id ' . "<a href=?action=read&controller=trajet&id=".rawurlencode($t->get("id")).">".htmlspecialchars($t->get("id")).'</a>' . '. Pour supprimer cet trajet cliquez' ."<a href=?action=delete&controller=trajet&id=".rawurlencode($t->get("id")).'>ici</a></p>';
        ?>
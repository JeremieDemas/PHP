        <?php
        foreach ($tab_v as $v)
            echo '<p> Voiture d\'immatriculation ' . "<a href=?action=read&immatriculation=".rawurlencode($v->getImmatriculation()).">".htmlspecialchars($v->getImmatriculation()).'</a>' . '. Pour supprimer cette voiture cliquez' ."<a href=?action=delete&immatriculation=".rawurlencode($v->getImmatriculation()).'>ici</a></p>';
        ?>
<?php
foreach ($tab_c as $c) {
    echo $c->get('idCommande').' '.$c->get('dateCommande').' '.$c->get('adrMail').' '.$c->get('montantCommande');
    echo "<br>";
}
?>
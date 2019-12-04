
    <?php
    foreach ($tab_p as $p) {
        echo '<p>' . 
            "<a href=\"" . 
            "index.php?nomFonction=read&arg1=" .
            $p->get('nomProduit') .
            "\">" .
            htmlspecialchars($p->get('nomProduit')) .
            "</a>" .
            ": " .
            $p->get('descriptionProduit').
            '.</p>';
    }
    echo "<a href=\"".
    "index.php?nomFonction=create&arg1=".
    "\">".
    "Créer un nouveau Produit".
    "</a>";

    echo "<br>";
    echo "<a href=\"index.php?nomFonction=showPanier&arg1=\">".
    "Voir panier ?</a>";
    ?>

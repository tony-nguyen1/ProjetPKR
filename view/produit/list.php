
    <?php
    foreach ($tab_p as $p) {
        echo '<p>' . 
            "<a href=\"" . 
            "index.php?nomFonction=read&arg1=" .
            $p->get('nomProduit') .
            "&controller=produit\">" .
            htmlspecialchars($p->get('nomProduit')) .
            "</a>" .
            ": " .
            $p->get('descriptionProduit').
            '.</p>';
    }
    echo "<a href=\"".
    "index.php?nomFonction=create&arg1=&controller=produit\">".
    "Créer un nouveau Produit".
    "</a>";

    echo "<br>";
    echo '<a href="index.php?nomFonction=showPanier&arg1=&controller=produit">'.
    "Voir panier ?</a>";
    ?>

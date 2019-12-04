<?php
    echo htmlspecialchars($prod->get('nomProduit')); 
    echo "<br>\n";
    echo $prod->get('descriptionProduit');
    echo "<br>\n";
    echo $prod->get('prix');

    echo "<br>";
    echo "<a href=\"index.php?nomFonction=delete&arg1=".
     $prod->get('nomProduit').
    "\">".
    "Suppprimer ce produit ?".
    "</a>";


     echo "<br>";
    echo "<a href=\"" . 
    "index.php?nomFonction=acheter&arg1=" .
     $prod->get('nomProduit') .
    "\">" .
     "Acheter" .
    "</a>";

    echo "<br>";
    echo "<a href=\"index.php?nomFonction=update&arg1=".
    $prod->get('nomProduit').
    "\">".
    "Modifier ce produit ?".
    "</a>";
?>
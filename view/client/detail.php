<?php


    echo htmlspecialchars($prod->get('adrMail')); 
    echo "<br>\n";
    echo $prod->get('nom');
    echo "<br>\n";
    echo $prod->get('prenom');

    /*echo "<br>";
    echo "<a href=\"index.php?nomFonction=delete&arg1=".
     $prod->get('nomProduit').
    "\">".
    "Suppprimer ce produit ?".
    "</a>";*/

    /*echo "<br>";
    echo "<a href=\"index.php?nomFonction=update&arg1=".
    $prod->get('nomProduit').
    "\">".
    "Modifier ce produit ?".
    "</a>";*/
?>
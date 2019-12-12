<?php
if (isset($_COOKIE["panier"])) {
    $str = unserialize($_COOKIE["panier"]);

    foreach ($str as $key => $value) {
        echo "Produit : ".$key;
        echo " qté : ".$value;
        echo "<br>";
    }

    echo '<a href="index.php?nomFonction=created&arg1=&controller=Commande">Valider achat ?</a>';
}
else {
    echo "Panier vide";
}
?>
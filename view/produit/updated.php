<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des produits</title>
    </head>
    <body>
        <?php
        echo "Le produit ".$nom." a été mise à jour.";
        require File::build_path(["view","produit","list.php"]);
        ?>
    </body>
</html>
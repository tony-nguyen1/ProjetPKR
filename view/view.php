<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
    	<nav>
    		<a href="index.php?action=readAll&controller=produit" style="border: 1px solid black;">		Liste des produits
    		</a>
    		<a href="index.php?action=readAll&controller=client">Liste des clients</a>
            <a href="index.php?action=readAll&controller=commande">Liste des commandes</a>
    	</nav>
<?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;
?>
		<p style="border: 1px solid black;text-align:right;padding-right:1em;">
		  Site de vente de Clé d'activation
		</p>
    </body>
</html>


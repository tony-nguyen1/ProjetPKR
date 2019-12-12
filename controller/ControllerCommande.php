<?php
require_once File::build_path(["model","ModelCommande.php"]); // chargement du modèle
class ControllerCommande {
    public static function readAll() {
        $tab_c = ModelCommande::selectAll();     //appel au modèle pour gerer la BD

        $controller = 'commande';
        $view = 'list';
        $pagetitle = 'Liste des commandes';
        require File::build_path(["view","view.php"]);  //"redirige" vers la vue
    }

    public static function read($idCommande) 
    {
    	$prod = ModelCommande::select($idCommande);

        $controller = 'commande';
        $view = 'detail';
        $pagetitle = 'Détails de la commande';
        require File::build_path(["view","view.php"]);
    }

    public static function created()
    {
        echo date("Y-m-d", time());
        if (isset($_COOKIE["panier"])) {//y a un panier
            $panier = new ModelCommande(NULL,date("Y-m-d", time()), "tony.nguyen@etu.umontpellier.fr", 11);

            $values = array (
                "idCommande" => $panier->get('idCommande'),
                "dateCommande" => $panier->get('dateCommande'),
                "adrMail" => $panier->get('adrMail'),
                "montantCommande" => $panier->get('montantCommande'),
            );

            $panier->save($values);

            $controller="produit";
            $action="readAll";
        }
        //else y a pas de panier
    }
}
?>
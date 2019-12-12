<?php
require_once File::build_path(["model","ModelProduit.php"]); // chargement du modèle
class ControllerProduit {
    public static function readAll() {
        $tab_p = ModelProduit::selectAll();     //appel au modèle pour gerer la BD

        $controller = 'produit';
        $view = 'list';
        $pagetitle = 'Liste des produits';
        require File::build_path(["view","view.php"]);  //"redirige" vers la vue
    }

	public static function read($nomProd) 
    {
    	$prod = ModelProduit::select($nomProd);


        $controller = 'produit';
        $view = 'detail';
        $pagetitle = 'Détails du produits';
        require File::build_path(["view","view.php"]);
    }

    public static function delete($nomProd) 
    {
        ModelProduit::delete($nomProd);
        ControllerProduit::readAll();
    }
    public static function update($nom) 
    {
        $tab_p = ModelProduit::selectAll();
        $p = ModelProduit::select($nom);
        $nomProduit = $p->get('nomProduit');
        $descriptionProduit = $p->get('descriptionProduit');
        $prix = $p->get('prix');
        $pathImage = $p->get('pathImage');


        $re1 = "readonly";
        $fct = "updated";
        $controller='produit';
        $view = 'update';
        $pagetitle = 'Mise à jour de '.$nom ;
        require File::build_path(["view","view.php"]);
    }
    public static function updated($immat) 
    {
        $arr = array(
            "nomProduit" => $_GET["nomProduit"],
            "descriptionProduit" => $_GET["descriptionProduit"],
            "prix" => $_GET["prix"]
        );

        ModelProduit::update($arr);
        $tab_p = ModelProduit::selectAll();
        $nom = $_GET["nomProduit"];
        $controller = 'produit';
        $view = 'updated';
        $pagetitle = $nom.' mit à jour';
        require File::build_path(["view","view.php"]);
    }
    public static function create() {
        $nomProduit = "";
        $descriptionProduit = "";
        $prix = "";

        $re1 = "required";

        $fct = "created";

        $controller = 'produit';
        $view = 'update';
        $pagetitle = 'Création d\'un produit';
        require File::build_path(["view","view.php"]);
    }
    public static function created() 
    {
        $nomProduit = $_GET["nomProduit"];
        $descriptionProduit = $_GET["descriptionProduit"];
        $prix = $_GET["prix"];
        
        $mp = new ModelProduit(NULL,$nomProduit, $descriptionProduit, $prix,NULL);

        $values = array (
            "idProduit" =>$mp->get('idProduit'),
            "nomProduit" => $mp->get('nomProduit'),
            "descriptionProduit" => $mp->get('descriptionProduit'),
            "prix" => $mp->get('prix'),
            "pathImage" => $mp->get('pathImage'),
        );

        $mp->save($values);
        ControllerProduit::readAll();
    }
    public static function error($a) {
        $action = $a;
        require_once File::build_path(["view","produit","error.php"]);
    }

    public static function acheter($name) {
        $nb = 1;
        echo $name."<br>";
        $name = str_replace(' ','',$name);/*
        if (isset($_COOKIE[$name])) {
            $nb = $_COOKIE[$name] + 1;
        }
        setcookie($name, $nb, 0);*/

        if (isset($_COOKIE["panier"])) {

            //reconstructions du panier au fur à mesure
            $str = unserialize($_COOKIE["panier"]);
            foreach ($str as $key => $value) {
                $panier[$key] = $value;
            }

            //on le rajoute ou l'incrémente
            if (isset($panier["$name"])) {
                echo "Il existe déjà<br>";
                $panier[$name] = $panier[$name] + 1;
            } else {
                echo "Il n'existe pas<br>";
                $panier[$name] = 1;
            }

            
            setcookie("panier", serialize($panier), 0);
        }
        else {
            $panier = array (
                $name => 1,
            );
            setcookie("panier", serialize($panier), 0);
        }
    }

    public static function showPanier() {
        /*echo "Ubuntu " . $_COOKIE["Ubuntu"]; 
        echo '<br>';

        echo "Windows10Famille " . $_COOKIE["Windows10Famille"];
        echo '<br>';
        
        echo "Windows10Pro " . $_COOKIE["Windows10Pro"];
        echo '<br>';*/

        if (isset($_COOKIE["panier"])) {
            $str = unserialize($_COOKIE["panier"]);

            foreach ($str as $key => $value) {
                echo "Produit : ".$key;
                echo " qté : ".$value;
                echo "<br>";
            }
        }
        else {
                echo "Panier vide";
        }

        $controller = 'produit';
        $view = 'panier';
        $pagetitle = 'Panier';
        require File::build_path(["view","view.php"]);
    }
}
?>
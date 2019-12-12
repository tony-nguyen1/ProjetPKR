<?php
require_once File::build_path(["model","ModelClient.php"]); // chargement du modèle
require_once File::build_path(["lib","Security.php"]);
class ControllerClient {
    public static function readAll() {
        $tab_c = ModelClient::selectAll();     //appel au modèle pour gerer la BD

        $controller = 'client';
        $view = 'list';
        $pagetitle = 'Liste des clients';
        require File::build_path(["view","view.php"]);  //"redirige" vers la vue
    }

    public static function read($adrMail) 
    {
    	$prod = ModelClient::select($adrMail);

        $controller = 'client';
        $view = 'detail';
        $pagetitle = 'Détails du client';
        require File::build_path(["view","view.php"]);
    }

    public static function create() {
        $adrMail = "";
        $nom = "";
        $prenom = "";
        $adrFacturation = "";
        $mdp = "";

        $re1 = "required";
        $fct = "created";

        $controller = 'client';
        $view = 'update';
        $pagetitle = 'Inscription';
        require File::build_path(["view","view.php"]);
    }
    public static function created() 
    {
        $adrMail = $_GET["adrMail"];
        $nom = $_GET["nom"];
        $prenom = $_GET["prenom"];
        $adrFacturation = $_GET["adrFacturation"];
        $mdp = $_GET["mdp"];
        $mdp2 = $_GET["mdp2"];

        if (strcmp($mdp,$mdp2) == 0) {
            echo "mdp identique";
            echo $mdp;
            echo Security::chiffrer($mdp);
        }
        else {
            echo "mdp different";
        }
        
        $client = new ModelClient($adrMail, $nom, $prenom, $adrFacturation, $mdp);

        $values = array (
            "adrMail" =>$client->get('adrMail'),
            "nom" => $client->get('nom'),
            "prenom" => $client->get('prenom'),
            "adrFacturation" => $client->get('adrFacturation'),
            "mdp" => $client->get('mdp'),
        );

        $client->save($values);
        ControllerClient::readAll();
    }
}
?>
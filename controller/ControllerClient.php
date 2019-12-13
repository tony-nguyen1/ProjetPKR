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
            $mdp = Security::chiffrer($mdp);
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

    public static function connect() {
        $controller = 'client';
        $view = 'connect';
        $pagetitle = 'Connection';
        require File::build_path(["view","view.php"]);
    }

    public static function connected() {
        $verification = Security::checkPassword($_GET["login"],Security::chiffrer($_GET["mdp"]));

        if ($verification == true) {

            $_SESSION['login'] = $_GET["login"];
            echo $_SESSION['login'];
            
            ControllerClient::read($_GET["login"]);
        }
    }
}
?>
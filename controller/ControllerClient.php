<?php
require_once File::build_path(["model","ModelClient.php"]); // chargement du modèle
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
        //require File::build_path(["view","view.php"]);
    }
}
?>
<?php
require_once File::build_path(["controller","ControllerClient.php"]);
require_once File::build_path(["controller","ControllerProduit.php"]);
require_once File::build_path(["controller","ControllerCommande.php"]);

$controller = "produit";
$action = "readAll";
$arg = "123";

if (isset($_GET["controller"])) {
	$controller = $_GET["controller"];
}

if (isset($_GET["nomFonction"])) {
	$action = $_GET["nomFonction"];
}

if (isset($_GET["nomFonction"])) {
	$arg = $_GET["arg1"];
}

$controller_class = "Controller".ucfirst($controller);

if (class_exists($controller_class)) {

	$mesMethodes = get_class_methods(new $controller_class());
	if (in_array($action, $mesMethodes)) {
		// Appel de la méthode statique $action de ControllerVoiture
		$controller_class::$action($arg);
	}
	else {
		$controller_class::error();
	}
}
else {
	ControllerProduit::error($action);
}

?>

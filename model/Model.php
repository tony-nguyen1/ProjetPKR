<?php
require File::build_path(["config","Conf.php"]);

class Model {
	static $pdo;

	public static function Init() {
		$hostname = Conf::getHostname();
		$database_name = Conf::getDatabase();
		$login = Conf::getLogin();
		$password = Conf::getPassword();
		try {
			self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password);
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		} catch (PDOException $e) {
			if (Conf::getDebug()) {
				echo $e->getMessage();
			} else {
				echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
			}
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			die();
		}
	}

	public static function selectAll() {
		$tab_name = static::$objet;
		$class_name = "Model".ucfirst($tab_name);

		try {
	    	$rep = Model::$pdo->query("SELECT * FROM ".$tab_name.";");
	    	$rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
			$tab_voit = $rep->fetchAll();
		} catch (PDOException $e) {
	    	if (Conf::getDebug()) {
	        	echo $e->getMessage();
			} else {
	        	echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
	        }
	        die();
	    }

	    return $tab_voit;
	}

	static public function select($primary_value) {
		$tab_name = static::$objet;
		$class_name = "Model".ucfirst($tab_name);
		$primary_key = static::$primary;

	    $sql = "SELECT * from ".$tab_name." WHERE ".$primary_key."=:nom_tag";
	    // Préparation de la requête
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "nom_tag" => $primary_value,
	    );

	    // On donne les valeurs et on exécute la requête   
	    $req_prep->execute($values);

	    // On récupère les résultats comme précédemment
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
	    $tab_voit = $req_prep->fetchAll();

	    // Attention, si il n'y a pas de résultats, on renvoie false
	    if (empty($tab_voit))
	        return false;
	    return $tab_voit[0];
	}

	static public function delete($primary) {
		$tab_name = static::$objet;
		$class_name = "Model".ucfirst($tab_name);
		$primary_key = static::$primary;
    
    	$sql = "DELETE FROM ".$tab_name." WHERE ".$primary_key."=:nom_tag";
	    // Préparation de la requête
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "nom_tag" => $primary,
	        //nomdutag => valeur, ...
	    );
	    // On donne les valeurs et on exécute la requête   
	    $req_prep->execute($values);
	}

	static public function update($data){
		$tab_name = static::$objet;
		$class_name = "Model".ucfirst($tab_name);
		$primary_key = static::$primary;

		$sql = "UPDATE ".$tab_name." SET ";
		foreach ($data as $cle => $valeur) {
	    	if (isset($data[$cle])) {
	    		$sql = $sql.$cle."=:".$cle.", ";
			}
	    }
	    $sql = rtrim($sql, ", ");
	    $sql = $sql." WHERE ".$primary_key."=:".$primary_key.";";

	    // Préparation de la requête
	    $req_prep = Model::$pdo->prepare($sql);

	    // On donne les valeurs et on exécute la requête   
	    $req_prep->execute($data);
	}

	public function save($values) {
		$tab_name = static::$objet;
		$class_name = "Model".ucfirst($tab_name);
		$primary_key = static::$primary;
	    

	    $sql = "INSERT INTO ".$tab_name." (";
	    foreach ($values as $cle => $valeur) {
	    	$sql = $sql.$cle.", ";
	    }
	    $sql = rtrim($sql, ", ");
	    $sql = $sql.") VALUES (";
	    foreach ($values as $cle => $valeur) {
	    	$sql = $sql.":".$cle.", ";
			
	    }
	    $sql = rtrim($sql, ", ");
	   	$sql = $sql.")";


	    // Préparation de la requête
	    $req_prep = Model::$pdo->prepare($sql);

	    // On donne les valeurs et on exécute la requête   
	    $req_prep->execute($values);

	    // On ne récupère pas les résultats
  }
}
Model::Init();
?>
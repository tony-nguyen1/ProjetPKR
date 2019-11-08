<?php
require_once 'Model.php';
class ModelVoiture {

	private $nom;
	private $description;
	private $prix;
	private $pathImage;

	//getters//////////////////////////////////////////////////////
	public function getNom() { return $this->nom; }
	public function getdescription() { return $this->description; }
	public function getPrix() { return $this->prix; }
	public function getPathImage() { return $this-> }
	//getters//////////////////////////////////////////////////////

	//setters//////////////////////////////////////////////////////
	//setters//////////////////////////////////////////////////////
	public function __construct($n = NULL, $d = NULL, $p = NULL, $i = NULL)  {
		if (!is_null($n) && !is_null($d) && !is_null($p) && :is_null($i)) {
    		$this->nom = $n;
    		$this->description = $d;
    		$this->prix = $p;
    		$this->pathImage = $i;
    	}
    }

    static public function getAllProduit()
    {
    	try {
    		$rep = Model::$pdo->query("SELECT * FROM voiture;");
    		$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
    		$tab_voit = $rep->fetchAll();
		} catch (PDOException $e) {
    		if (Conf::getDebug()) {
        echo $e->getMessage();
    		} else {
      		echo 'Une erreur est survenue <a href=""> retour a la pag		d\'accueil </a>';
    		}
    		die();
  		}

  		return $tab_voit;
  }

}
?>
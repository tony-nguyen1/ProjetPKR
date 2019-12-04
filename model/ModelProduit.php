<?php
require_once File::build_path(['model','Model.php']);
class ModelProduit extends Model{

    private $idProduit;
	private $nomProduit;
	private $descriptionProduit;
	private $prix;
	private $pathImage;
    static protected $objet = "produit";
    protected static $primary='nomProduit';

	//getters//////////////////////////////////////////////////////
	public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }
	//getters//////////////////////////////////////////////////////

	//setters//////////////////////////////////////////////////////
	//setters//////////////////////////////////////////////////////
	public function __construct($id = NULL,$n = NULL, $d = NULL, $p = NULL, $i = NULL)  {
		if (is_null($id) && !is_null($n) && !is_null($d) && !is_null($p) && is_null($i)) {
            $this->idProduit = $i;
    		$this->nomProduit = $n;
    		$this->descriptionProduit = $d;
    		$this->prix = $p;
    		$this->pathImage = $i;
    	}
    }

    public function affichage() {
        echo "<br>";
        echo $this->nomProduit;
        echo " ";
        echo $this->descriptionProduit;
    }
}
?>
<?php

require_once File::build_path(["model","Model.php"]);

class ModelCommande extends Model{

    private $idCommande;
    private $dateCommande;
    private $adrMail;
    private $montantCommande;
    static protected $objet = "commande";
    protected static $primary='idCommande';

    // Getter générique (pas expliqué en TD)
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // Setter générique (pas expliqué en TD)
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    // un constructeur
    public function __construct($idCommande = NULL, $dateCommande = NULL, $adrMail = NULL, $montantCommande = NULL) {
        if (is_null($idCommande) && !is_null($dateCommande) && !is_null($adrMail) && !is_null($montantCommande)) {
            $this->idCommande = $idCommande;
            $this->dateCommande = $dateCommande;
            $this->adrMail = $adrMail;
            $this->montantCommande = $montantCommande;
        }
    }
}
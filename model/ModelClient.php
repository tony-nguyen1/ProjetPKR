<?php

require_once File::build_path(["model","Model.php"]);

class ModelClient extends Model{

    private $adrMail;
    private $nom;
    private $prenom;
    private $adrFacturation;
    private $mdp;
    static protected $objet = "client";
    protected static $primary='adrMail';

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
    public function __construct($adrMail = NULL, $nom = NULL, $prenom = NULL, $adrFacturation = NULL, $mdp = NULL) {
        if (!is_null($adrMail) && !is_null($nom) && !is_null($prenom) && !is_null($adrFacturation) && !is_null($mdp)) {
            $this->adrMail = $adrMail;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adrFacturation = $adrFacturation;
            $this->mdp = $mdp;
        }
    }
}
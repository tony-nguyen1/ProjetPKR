<?php
class Security {
	static protected $seed = "seed";
	public static function chiffrer($texte_en_clair) {
		$texte_chiffre = hash('sha256', $texte_en_clair);
		return $texte_chiffre;
	}

	public static function checkPassword($login, $mot_de_passe_chiffre) {
        $tab_client = ModelClient::selectAll();

        foreach ($tab_client as $client) {
            if (strcmp($client->get("adrMail"), $login) == 0 && strcmp($client->get("mdp"),$mot_de_passe_chiffre) == 0) {
                return true;
            }
        }

        return false;
    }
}
?>
<?php

class Security {

	private static $seed = 'AfvhjDRTAbkjBJ';

	public static function chiffrer($texte_en_clair) {
	  $texte_chiffre = hash('sha256', self::getSeed().$texte_en_clair);
	  return $texte_chiffre;
	}

	static public function getSeed() {
   		return self::$seed;
	}

}

?>
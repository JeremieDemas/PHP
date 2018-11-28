<?php
class Utilisateur {

	private $login;
	private $nom;
	private $prenom;

	public function get($nom_attribut) {
		return $objet->$nom_attribut;
	}

	public function set($nom_attribut, $valeur) {
		$objet->$nom_attribut=$valeur;
	}

	public function __construct($data) {
		$data[0]=this->$login;
		$data[1]=this->$nom;
		$data[2]=this->$prenom;
	}

}
?>
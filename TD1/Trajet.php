<?php
class Utilisateur {

	private $id;
	private $depart;
	private $arrivee;
	private $date;
	private $nbplaces;
	private $prix;
	private $conducteur_login;

	public function get($nom_attribut) {
		return $objet->$nom_attribut;
	}

	public function set($nom_attribut, $valeur) {
		$objet->$nom_attribut=$valeur;
	}

	public function __construct($data) {
		$data[0]=this->$id;
		$data[1]=this->$depart;
		$data[2]=this->$arrivee;
		$data[3]=this->$date;
		$data[4]=this->$nbplaces;
		$data[5]=this->$prix;
		$data[6]=this->$conducteur_login;	
	}

}
?>
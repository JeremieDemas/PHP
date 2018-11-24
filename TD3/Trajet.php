<?php
class Trajet {

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

	/*public function __construct($data) {
		$data[0]=this->$id;
		$data[1]=this->$depart;
		$data[2]=this->$arrivee;
		$data[3]=this->$date;
		$data[4]=this->$nbplaces;
		$data[5]=this->$prix;
		$data[6]=this->$conducteur_login;	
	}*/

	public function __construct($id = NULL, $dep = NULL, $arr = NULL, $date = NULL, $nbp = NULL, $prix = NULL, $clogin = NULL) {
	    if (!is_null($id) && !is_null($dep) && !is_null($arr) && !is_null($date) && !is_null($nbp) && !is_null($prix) && !is_null($clogin)) {
	      $this->id = $id;
	      $this->depart = $dep;
	      $this->arrivee = $arr;
	      $this->date = $date;
	      $this->nbplaces = $nbp;
	      $this->prix = $prix;
	      $this->conducteur_login = $clogin;
	    }
	}

	public static function getAllTrajets() {
    $rep=Model::$pdo->query("SELECT * FROM trajet");
    $rep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
    $tab_trajet = $rep->fetchAll();
    foreach ($tab_trajet as $key => $value) {
    	$value->afficher();
    }
  }

  public function afficher() {
  	echo "<p> Le trajet numéro $this->id effectué par $this->conducteur_login le $this->date en provenance de $this->depart et à destination de $this->arrivee propose $this->nbplaces places pour $this->prix € l'unité. </p>";
  }

}
?>
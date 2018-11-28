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

	/*public function __construct($data) {
		$data[0]=this->$login;
		$data[1]=this->$nom;
		$data[2]=this->$prenom;
	}*/

	public function __construct($log = NULL, $nom = NULL, $pre = NULL) {
	    if (!is_null($log) && !is_null($nom) && !is_null($pre)) {
	      $this->login = $log;
	      $this->nom = $nom;
	      $this->prenom = $pre;
	    }
	}

	public static function getAllUtilisateurs() {
    $rep=Model::$pdo->query("SELECT * FROM utilisateur");
    $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
    $tab_utilisateur = $rep->fetchAll();
    foreach ($tab_utilisateur as $key => $value) {
      $value->afficher(); 
    }
  }

  public function afficher() {
  	echo "<p> L'utilisateur $this->login s'appelle $this->prenom $this->nom. </p>";		
  }

}
?>
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

  public static function findTrajets($login) {
  	try {
  		$sql="SELECT * FROM utilisateur u JOIN passager p ON u.login=p.utilisateur_login JOIN trajet t ON p.trajet_id=t.id WHERE login=:tag_id";
  		$req_prep=Model::$pdo->prepare($sql);
  		$values=array(
  			"tag_id" => $login,
  		);
  		$req_prep->execute($values);
  		$req_prep->setFetchMode(PDO::FETCH_CLASS,'Trajet');
  		$tab_trajet=$req_prep->fetchAll();
  		if(empty($tab_trajet)) {
  			return false;
  		}
  		return $tab_trajet;
  	}
  	catch (PDOException $e) {
	  if (Conf::getDebug()) {
	    echo $e->getMessage(); // affiche un message d'erreur
	  }
	  else {
	    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
	  }
	  die();
	}
  }

}
?>
<?php

require_once File::build_path(array("model","Model.php"));

class ModelUtilisateur extends Model {

	protected static $object="utilisateur";
	protected static $primary="login";

	private $login;
	private $nom;
	private $prenom;
	private $mdp;
	private $admin;

	public function get($attribut) {
		return $this->$attribut;
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

	public static function getUtilisateurByLogin($login) {
	    try {
	    	$sql = "SELECT * from utilisateur WHERE login=:nom_tag";
		    // Préparation de la requête
		    $req_prep = Model::$pdo->prepare($sql);

		    $values = array(
		        "nom_tag" => $login,
		        //nomdutag => valeur, ...
		    );
		    // On donne les valeurs et on exécute la requête	 
		    $req_prep->execute($values);

		    // On récupère les résultats comme précédemment
		    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
		    $tab_utilisateur = $req_prep->fetchAll();
		    // Attention, si il n'y a pas de résultats, on renvoie false
		    if (empty($tab_utilisateur))
		        return false;
		    return $tab_utilisateur;//[0];
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

	public static function checkPassword($login,$mot_de_passe_chiffre) {
		try {
	    	$sql = "SELECT * from utilisateur WHERE login=:login_tag AND mdp=:mdp_tag";
		    // Préparation de la requête
		    $req_prep = Model::$pdo->prepare($sql);

		    $values = array(
		        "login_tag" => $login,
		        "mdp_tag" => $mot_de_passe_chiffre,
		        //nomdutag => valeur, ...
		    );
		    // On donne les valeurs et on exécute la requête	 
		    $req_prep->execute($values);

		    // On récupère les résultats comme précédemment
		    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
		    $tab_utilisateur = $req_prep->fetchAll();
		    // Attention, si il n'y a pas de résultats, on renvoie false
		    if (empty($tab_utilisateur)) {
		        return false;
		    }
		    else {
		    	return true;//[0];
	  		}

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

  /*public static function update($data) {
    try {
      $login=$_POST["login"];
      $sql="UPDATE utilisateur SET nom=:tag_nom,prenom=:tag_prenom WHERE login=:tag_login";
      $req_prep=Model::$pdo->prepare($sql);
      $values=array(
        "tag_nom" => $data["nom"],
        "tag_prenom" => $data["prenom"],
        "tag_login" => $login,
      );
      $req_prep->execute($values);
      $req_prep->setFetchMode(PDO::FETCH_CLASS,'ModelUtilisateur');
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
  }*/

	/*public static function getAllUtilisateurs() {
		try {
			$rep=Model::$pdo->query("SELECT * FROM utilisateur");
		    $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
		    $tab_utilisateur = $rep->fetchAll();
		    if (empty($tab_utilisateur)) {
		    	echo "<p> Aucun utilisateur n'est disponible. </p>";
		    }
		    else {
		    	return $tab_utilisateur;
		    }
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
    }*/

  /*public function afficher() {
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
  }*/

}
?>
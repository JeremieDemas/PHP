<?php

require_once File::build_path(array("model","Model.php"));

class ModelVoiture extends Model {

  protected static $object="voiture";
  protected static $primary="immatriculation";
   
  private $marque;
  private $couleur;
  private $immatriculation;
      
  // un getter      
  public function getMarque() {
       return $this->marque;  
  }
     
  // un setter 
  public function setMarque($marque2) {
       $this->marque = $marque2;
  }
      
  /*// un constructeur
  public function __construct($m, $c, $i)  {
   $this->marque = $m;
   $this->couleur = $c;
   $this->immatriculation = $i;
  }*/ 

  // La syntaxe ... = NULL signifie que l'argument est optionel
  // Si un argument optionnel n'est pas fourni,
  //   alors il prend la valeur par défaut, NULL dans notre cas
  public function __construct($m = NULL, $c = NULL, $i = NULL) {
    if (!is_null($m) && !is_null($c) && !is_null($i)) {
      // Si aucun de $m, $c et $i sont nuls,
      // c'est forcement qu'on les a fournis
      // donc on retombe sur le constructeur à 3 arguments
      $this->marque = $m;
      $this->couleur = $c;
      $this->immatriculation = $i;
    }
  }
           
  // une methode d'affichage.
  /*public function afficher() {
    echo "<p> Voiture $this->immatriculation de marque $this->marque (couleur $this->couleur). </p>";
  }*/

    // un getter      
  public function getCouleur() {
       return $this->couleur;  
  }
     
  // un setter 
  public function setCouleur($couleur2) {
       $this->couleur = $couleur2;
  }

    // un getter      
  public function getImmatriculation() {
       return $this->immatriculation;  
  }
     
  // un setter 
  public function setImmatriculation($immatriculation2) {
      if(strlen($immatriculation2)<=8) {
        $this->immatriculation = $immatriculation2;
      }
      else {
        echo "L'immatriculation est limitée à 8 caractères";
      }
  }

  /*public static function getAllVoitures() {
    try {
    	$rep=Model::$pdo->query("SELECT * FROM voiture");
	    $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
	    $tab_voit = $rep->fetchAll();
      return $tab_voit;
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

  public static function getVoitureByImmat($immat) {
    try {
    	$sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
	    // Préparation de la requête
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "nom_tag" => $immat,
	        //nomdutag => valeur, ...
	    );
	    // On donne les valeurs et on exécute la requête	 
	    $req_prep->execute($values);

	    // On récupère les résultats comme précédemment
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
	    $tab_voit = $req_prep->fetchAll();
	    // Attention, si il n'y a pas de résultats, on renvoie false
	    if (empty($tab_voit))
	        return false;
	    return $tab_voit;//[0];
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

  /*public function save() {
  	try {
  		$sql="INSERT INTO voiture (immatriculation,marque,couleur) VALUES (:tag_immatriculation,:tag_marque,:tag_couleur)";
	  	$req_prep=Model::$pdo->prepare($sql);
	  	$values=array(
	  		'tag_immatriculation' => $this->immatriculation,
	  		'tag_marque' => $this->marque,
	  		'tag_couleur' => $this->couleur,
	  	);
	  	$req_prep->execute($values);
	  	$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
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

  /*public static function deleteByImmat($immat) {
    try {
      $sql="DELETE FROM voiture WHERE immatriculation=:tag_immat";
      $req_prep=Model::$pdo->prepare($sql);
      $values=array(
        "tag_immat" => $immat,
      );
      $req_prep->execute($values);
      $req_prep->setFetchMode(PDO::FETCH_CLASS,'ModelVoiture');
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

  /*public static function update($data) {
    try {
      $immat=$_POST["immatriculation"];
      $sql="UPDATE voiture SET couleur=:tag_couleur,marque=:tag_marque WHERE immatriculation=:tag_immatriculation";
      $req_prep=Model::$pdo->prepare($sql);
      $values=array(
        "tag_couleur" => $data["couleur"],
        "tag_marque" => $data["marque"],
        "tag_immatriculation" => $immat,
      );
      $req_prep->execute($values);
      $req_prep->setFetchMode(PDO::FETCH_CLASS,'ModelVoiture');
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>
   
    <body>
        Voici le résultat du script PHP : 
        <?php
          // Ceci est un commentaire PHP sur une ligne
          /* Ceci est le 2ème type de commentaire PHP
          sur plusieurs lignes */
           
          // On met la chaine de caractères "hello" dans la variable 'texte'
          // Les noms de variable commencent par $ en PHP
          $texte = "hello world !";

          // On écrit le contenu de la variable 'texte' dans la page Web
          echo $texte;

          $marque="Renault";
          $couleur="bleu";
          $immatriculation="256AB34";

          echo "<p> Voiture $immatriculation de marque $marque (couleur $couleur) </p>";

          $voiture=array(
          	marque=>Mazda,
          	couleur=>rouge,
          	immatriculation=>ABC123);

          var_dump($voiture);

          echo "<p> Voiture $voiture[immatriculation] de marque $voiture[marque] (couleur $voiture[couleur]) </p>";

          $voitures=array($voiture);

          var_dump($voitures);

          echo "<p> Liste des voitures </p>"; 
          if(empty($voitures)) {
          	echo "Le tableau est vide";
          }

          foreach ($voitures as $key => $value) {
          	echo "<ul> Voiture $value[immatriculation] de marque $value[marque] (couleur $value[couleur]) </ul>";
          }
        ?>
    </body>
</html>
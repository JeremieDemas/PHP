<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>
   
    <body>
    	<form method="get" action="testDelPassager.php">
  			<fieldset>
    			<legend>Mon formulaire :</legend>
    			<p>
      				<label for="id_trajet">Id trajet</label> :
      					<input type="text" placeholder="Ex : 1" name="id_trajet" id="trajet_id" required/>
    			</p>
          <p>
              <label for="login_utilisateur">Login utilisateur</label> :
                <input type="text" placeholder="Ex : 1" name="login_utilisateur" id="login_utilisateur" required/>
          </p>
          <p>
              <input type="submit" value="Envoyer" />
          </p>
  			</fieldset> 
		</form>
	</body>

</html>
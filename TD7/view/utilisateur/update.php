  		<form method="post" action="index.php?action=<?php echo $action ?>&controller=utilisateur">	
  			<fieldset>
    			<legend>Mon formulaire :</legend>
          		<p>
      				<label for="login_id">Login</label> :
      					<input type="text" value="<?php foreach($u as $value) { echo htmlspecialchars($value->get("login")); } ?>" name="login" id="login_id" <?php echo $mode; ?>/>
    			</p>
    			<p>
      				<label for="nom_id">Nom</label> :
      					<input type="text" value="<?php foreach($u as $value) { echo htmlspecialchars($value->get("nom")); } ?>" name="nom" id="nom_id" required/>
    			</p>
    			<p>
      				<label for="prenom_id">Prénom</label> :
      					<input type="text" value="<?php foreach($u as $value) { echo htmlspecialchars($value->get("prenom")); } ?>" name="prenom" id="prenom_id" required/>
    			</p>
          <p>
              <input type="hidden" value="<?php echo static::$object;?>" />
      				<input type="submit" value="Envoyer" />
    			</p>
  			</fieldset> 
		</form>
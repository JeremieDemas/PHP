  		<form method="post" action="index.php?action=connected&controller=utilisateur">	
  			<fieldset>
    			<legend>Mon formulaire :</legend>
          <p>
      				<label for="login_id">Login</label> :
      					<input type="text" name="login" id="login_id" required/>
    			</p>
    			<p>
      				<label for="mdp_id">Mot de passe</label> :
      					<input type="password" name="mdp" id="mdp_id" required/>
    			</p>
          <p>
              <input type="hidden" value="<?php echo static::$object;?>" />
      				<input type="submit" value="Envoyer" />
    			</p>
  			</fieldset> 
		</form>
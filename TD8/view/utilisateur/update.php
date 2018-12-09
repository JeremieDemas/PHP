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
              <label for="email_id">Adresse mail</label> :
                <input type="email" value="<?php foreach($u as $value) { echo htmlspecialchars($value->get("email")); } ?>" name="email" id="email_id" required/>
          </p>
    			<p>
      				<label for="mdp_id">Nouveau mot de passe</label> :
      					<input type="password" name="mdp" id="mdp_id" required/>
    			</p>
    			<p>
      				<label for="mdpc_id">Confirmer mot de passe</label> :
      					<input type="password" name="mdpc" id="mdpc_id" required/>
    			</p>
          <?php
          if(Session::is_admin($_SESSION["admin"])) {
            echo "<p>".'<label for="admin_id">'."Administrateur ?".'</label>'." : ".'<input type="checkbox" name="admin" id="admin_id" >'."</p>";
          }
          ?>
          <p>
              <input type="hidden" value="<?php echo static::$object;?>" />
      				<input type="submit" value="Envoyer" />
    			</p>
  			</fieldset> 
		</form>
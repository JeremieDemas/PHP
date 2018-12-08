  		<form method="post" action="index.php?action=<?php echo $action ?>&controller=trajet">	
  			<fieldset>
    			<legend>Mon formulaire :</legend>
          <p>
      				<label for="id_id">Id</label>
      					<input type="number" value="<?php foreach($t as $value) { echo htmlspecialchars($value->get("id")); } ?>" name="id" id="id_id" <?php echo $mode; ?>/>
    			</p>
    			<p>
      				<label for="depart_id">Depart</label> :
      					<input type="text" value="<?php foreach($t as $value) { echo htmlspecialchars($value->get("depart")); } ?>" name="depart" id="depart_id" required/>
    			</p>
    			<p>
      				<label for="arrivee_id">Arrivée</label> :
      					<input type="text" value="<?php foreach($t as $value) { echo htmlspecialchars($value->get("arrivee")); } ?>" name="arrivee" id="arrivee_id" required/>
    			</p>
          <p>
              <label for="date_id">Date</label>
                <input type="date" value="<?php foreach($t as $value) { echo htmlspecialchars($value->get("date")); } ?>" name="date" id="date_id" required/>
          </p>
          <p>
              <label for="nbplaces_id">Nombre de places</label> :
                <input type="number" value="<?php foreach($t as $value) { echo htmlspecialchars($value->get("nbplaces")); } ?>" name="nbplaces" id="nbplaces_id" required/>
          </p>
          <p>
              <label for="prix_id">Prix</label> :
                <input type="number" value="<?php foreach($t as $value) { echo htmlspecialchars($value->get("prix")); } ?>" name="prix" id="prix_id" required/>
          </p>
          <p>
              <label for="conducteur_login_id">Login du conducteur</label>
                <input type="text" value="<?php foreach($t as $value) { echo htmlspecialchars($value->get("conducteur_login")); } ?>" name="conducteur_login" id="conducteur_login_id" <?php echo $mode; ?>/>
          </p>
          <p>
              <input type="hidden" value="<?php echo static::$object;?>" />
      				<input type="submit" value="Envoyer" />
    			</p>
  			</fieldset> 
		</form>
  		<form method="post" action="index.php?action=<?php echo $action ?>">	
  			<fieldset>
    			<legend>Mon formulaire :</legend>
          		<p>
      				<label for="immat_id">Immatriculation</label>
      					<input type="text" value="<?php foreach($v as $value) { echo htmlspecialchars($value->getImmatriculation()); } ?>" $mode="<?php echo $_GET["immat"] ?>" name="immatriculation" id="immat_id" required/>
    			</p>
    			<p>
      				<label for="marque_id">Marque</label> :
      					<input type="text" value="<?php foreach($v as $value){ echo htmlspecialchars($value->getMarque());} ?>" name="marque" id="marque_id" required/>
    			</p>
    			<p>
      				<label for="couleur_id">Couleur</label> :
      					<input type="text" value="<?php foreach($v as $value){ echo htmlspecialchars($value->getCouleur());} ?>" name="couleur" id="couleur_id" required/>
    			</p>
          <p>
              <input type="hidden" value="<?php echo static::$object;?>" />
      				<input type="submit" value="Envoyer" />
    			</p>
  			</fieldset> 
		</form>
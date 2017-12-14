<h2>views/connexion.php</h2>
		<form action="<?=BASEURL?>/index.php/user/connexion_valide" method="post">
		<label for="user_nom">Nom : </label><input type="text" name="nom" id="user_nom" />
  		<label for="user_pass">Password : </label><input type="password" name="password" id="user_pass" />
  		<input type="submit" value="Envoyer">
		</form>


<?php
	// Si identifiants erronés
	if(isset($donneesVue['message']))
		echo $donneesVue['message'];
?>

<form action="controleur.php?action=action_seConnecter" method="post">
  <label for="login">Login :</label> <input type="text" name="login" id="login"/></p>
  <label for="mdp">Mot de passe :</label> <input type="password" name="mdp" id="mdp" /></p>
  <input type="submit" value="Connexion"/>
</form>
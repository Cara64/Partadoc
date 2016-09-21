<ul>
	<li class="nomUtilisateur"><?php echo "Bienvenue ".$donneesVue['utilisateur']['prenom'].' '.$donneesVue['utilisateur']['nom'];?></li>
	<li class="boutonAccueil"><a href="controleur.php?action=action_accederAccueil">Accueil</a></li>
	<li class="boutonAjout"><a href="controleur.php?action=action_ajouterFichier">Ajouter/Remplacer fichiers</a></li>
	<li class="boutonHistorique"><a href="controleur.php?action=action_consulterHistorique">Consulter historique</a></li>
	<li class="boutonDeconnexion"><a href="controleur.php?action=action_initialiser">Se d&eacute;connecter</a></li>
</ul>
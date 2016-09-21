<?php


		// Initialisation du r�pertoire partag� >> $repertoirePartage
		$repertoirePartage = "repertoirePartage/";
	
		// $repertoirePartage >> lister fichiers >> $tableauFichiers
		$tableauFichiers = listerFichiers($repertoirePartage);
		
		if (count($tableauFichiers) == 0){
			echo "Il n'y a pas de fichiers partag&eacute;s";
		}else{
	
		// Ent�te du tableau
		echo "<table>
				<tr>
					<th>Nom du fichier</th>
					<th>Taille</th>
					<th>Date d'upload</th>
					<th>Suppression</th>
					<th>Rapatriement</th>
				</tr>";
	
	// $tableauFichiers >> affichage du tableau dans l'ordre chronologique d�croissant 
	for($i=count($tableauFichiers)-1; $i>=0; $i--){
		$nomFichier = $tableauFichiers[$i]['nom'];
		echo "<tr>
				<td>".$tableauFichiers[$i]['nom']."</td>
				<td>".$tableauFichiers[$i]['taille']." ko</td>
				<td>".$tableauFichiers[$i]['dateUpload']."</td>
				<td><form action='controleur.php?action=action_supprimer' method='post'><input type='hidden' name='nomFichier' value='$nomFichier' /><input type='image' src='images/supprimer.png' oname='submit' value='Supprimer' /></form></td>
				<td><a href=$repertoirePartage$nomFichier><img src='images/enregistrer.png'/></a></td>
			</tr>";
	}
	echo "</table>";
}		
?>
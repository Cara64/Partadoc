<?php
	if ($donneesVue['nbResultat'] == 0) // si rien dans l'historique
		echo "Il n'y a rien dans l'historique";
	else{
	
	echo "<table>
			<tr>
				<th>Nom utilisateur</th>
				<th>Op&eacute;ration</th>
				<th>Fichiers</th>
				<th>Date</th>
			</tr>";
	 
	 // on a des données dans l'historique
	 for ($i=$donneesVue['nbResultat']-1; $i>=0; $i--){
	 echo "<tr>
				<td>".$donneesVue['resultat'][$i]['utilisateur']."</td>
				<td>".$donneesVue['resultat'][$i]['operation']."</td>
				<td>".$donneesVue['resultat'][$i]['fichier']."</td>
				<td>".$donneesVue['resultat'][$i]['dateOperation']."</td>
			</tr>";
		}
	echo "</table>";
	}
?>
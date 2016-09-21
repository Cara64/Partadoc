<?php
// Fonction qui r�cup�re le contenu d'un r�pertoire et le liste dans un tableau
// Prend en param�tre le chemin du r�pertoire
// Retourne un tableau de fichier indic� avec 'nom', 'taille', 'dateUpload'

function listerFichiers($cheminRepertoire){
	// $cheminRepertoire >> Ouverture du r�pertoire >> $repertoire
	$repertoire = opendir($cheminRepertoire);
	
	// Initialisation du compteur et du tableau >> $compteur, $tableauFichiers
	$compteur = 0;
	$tableauFichiers = array();

	// $repertoire >> Affichage sous forme de tableau des diff�rents fichiers
	while ($lectureRepertoire = readdir($repertoire)){
		if (is_file($cheminRepertoire.'/'.$lectureRepertoire)){
			
			// $cheminRepertoire, $lectureRepertoire >> R�cup�rer la taille du fichier >> $tailleFichier
			$tailleFichier = filesize($cheminRepertoire.'/'.$lectureRepertoire);
			
			//$cheminRepertoire, $lectureRepertoire >> R�cup�rer sa date d'upload >> $dateUpload
			$dateUpload = date('d/m/Y H:i:s', filemtime($cheminRepertoire.'/'.$lectureRepertoire));
			
			//$lectureRepertoire, $tailleFichier, $dateUpload >> Stockage dans un tableau >> $tableauFichier
			$tableauFichiers[$compteur]['nom'] = $lectureRepertoire;
			$tableauFichiers[$compteur]['taille'] = $tailleFichier;
			$tableauFichiers[$compteur]['dateUpload'] = $dateUpload;
			
			// $compteur >> Incr�mentation du compteur >> $compteur
			$compteur++;
		}
			
	}  
	
	// $repertoire >> Fermeture du r�pertoire
	closedir($repertoire);
	
	return $tableauFichiers;
}
?>
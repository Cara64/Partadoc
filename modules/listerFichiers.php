<?php
// Fonction qui récupère le contenu d'un répertoire et le liste dans un tableau
// Prend en paramètre le chemin du répertoire
// Retourne un tableau de fichier indicé avec 'nom', 'taille', 'dateUpload'

function listerFichiers($cheminRepertoire){
	// $cheminRepertoire >> Ouverture du répertoire >> $repertoire
	$repertoire = opendir($cheminRepertoire);
	
	// Initialisation du compteur et du tableau >> $compteur, $tableauFichiers
	$compteur = 0;
	$tableauFichiers = array();

	// $repertoire >> Affichage sous forme de tableau des différents fichiers
	while ($lectureRepertoire = readdir($repertoire)){
		if (is_file($cheminRepertoire.'/'.$lectureRepertoire)){
			
			// $cheminRepertoire, $lectureRepertoire >> Récupérer la taille du fichier >> $tailleFichier
			$tailleFichier = filesize($cheminRepertoire.'/'.$lectureRepertoire);
			
			//$cheminRepertoire, $lectureRepertoire >> Récupérer sa date d'upload >> $dateUpload
			$dateUpload = date('d/m/Y H:i:s', filemtime($cheminRepertoire.'/'.$lectureRepertoire));
			
			//$lectureRepertoire, $tailleFichier, $dateUpload >> Stockage dans un tableau >> $tableauFichier
			$tableauFichiers[$compteur]['nom'] = $lectureRepertoire;
			$tableauFichiers[$compteur]['taille'] = $tailleFichier;
			$tableauFichiers[$compteur]['dateUpload'] = $dateUpload;
			
			// $compteur >> Incrémentation du compteur >> $compteur
			$compteur++;
		}
			
	}  
	
	// $repertoire >> Fermeture du répertoire
	closedir($repertoire);
	
	return $tableauFichiers;
}
?>
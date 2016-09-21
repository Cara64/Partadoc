<?php

// ACTION DE SUPPRESSION : Supprimer un fichier du répertoire

// -------------------------------------------------------
// Recuperer les donnees d'entree necessaires a l'action
// -------------------------------------------------------

$nomFichierAsupprimer = $_REQUEST['nomFichier'];							// nom du fichier à supprimer
$cheminFichierAsupprimer = 'repertoirePartage/'.$nomFichierAsupprimer;		// chemin du fichier à supprimer
$utilisateur = $_SESSION['utilisateur']['login'];							// login de l'utilisateur
$dateOperation = date("d/m/Y H:i:s");										// date à laquelle l'opération a été effectuée


// -------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

// $cheminFichierAsupprimer >> On vérifie que le fichier existe
if (file_exists($cheminFichierAsupprimer)){
	
	// $cheminFichierAsupprimer >> Suppression >> $operation
	if (unlink($cheminFichierAsupprimer)){  // si succès
		$operation = "Suppression"; 
		enregistrerHistorique($utilisateur, $operation, $nomFichierAsupprimer, $dateOperation, $bd); // enregistrement de l'opération 
		$_SESSION['message'] = "Le fichier ".$nomFichierAsupprimer." a été supprimé"; // message de confirmation
		}
	else{ // échec
		$_SESSION['message'] = "Le fichier ".$nomFichierAsupprimer." n'a pas pû être supprimé";
	}
}else{
	$_SESSION['message'] = "Le fichier ".$nomFichierAsupprimer." n'existe pas dans le répertoire de partage";
}


// -------------------------------------------------------
// Definir le nouvel etat de l'application
// -------------------------------------------------------

$_SESSION['etat']='etat_utilisateurIdentifieAccueil';  


// -------------------------------------------------------
// Preparer les donnees de la vue resultante
// -------------------------------------------------------

// Definition des donnees structurelles de la vue
$donneesVue['titre']=$titreApplication;
$donneesVue['zone_haute']=$vuesElementaires['vueElementaire_entete'];
$donneesVue['zone_navigation']=$vuesElementaires['vueElementaire_navigationAccueil'];
$donneesVue['zone_messageSysteme']=$vuesElementaires['vueElementaire_messageSysteme'];
$donneesVue['zone_principale']=$vuesElementaires['vueElementaire_accueil'];
$donneesVue['style']=$feuillesDeStyle['styleApresIdentification'];
  
// Definition des données dynamiques de la vue
$donneesVue['message'] = utf8_encode($_SESSION['message']);
$donneesVue['utilisateur'] = $_SESSION['utilisateur'];
 
// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;

?> 
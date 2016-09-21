<?php

// ACTION DE SUPPRESSION : Supprimer un fichier du r�pertoire

// -------------------------------------------------------
// Recuperer les donnees d'entree necessaires a l'action
// -------------------------------------------------------

$nomFichierAsupprimer = $_REQUEST['nomFichier'];							// nom du fichier � supprimer
$cheminFichierAsupprimer = 'repertoirePartage/'.$nomFichierAsupprimer;		// chemin du fichier � supprimer
$utilisateur = $_SESSION['utilisateur']['login'];							// login de l'utilisateur
$dateOperation = date("d/m/Y H:i:s");										// date � laquelle l'op�ration a �t� effectu�e


// -------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

// $cheminFichierAsupprimer >> On v�rifie que le fichier existe
if (file_exists($cheminFichierAsupprimer)){
	
	// $cheminFichierAsupprimer >> Suppression >> $operation
	if (unlink($cheminFichierAsupprimer)){  // si succ�s
		$operation = "Suppression"; 
		enregistrerHistorique($utilisateur, $operation, $nomFichierAsupprimer, $dateOperation, $bd); // enregistrement de l'op�ration 
		$_SESSION['message'] = "Le fichier ".$nomFichierAsupprimer." a �t� supprim�"; // message de confirmation
		}
	else{ // �chec
		$_SESSION['message'] = "Le fichier ".$nomFichierAsupprimer." n'a pas p� �tre supprim�";
	}
}else{
	$_SESSION['message'] = "Le fichier ".$nomFichierAsupprimer." n'existe pas dans le r�pertoire de partage";
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
  
// Definition des donn�es dynamiques de la vue
$donneesVue['message'] = utf8_encode($_SESSION['message']);
$donneesVue['utilisateur'] = $_SESSION['utilisateur'];
 
// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;

?> 
<?php

// Action effectu� quand elle n'est pas autoris�e
// Si l'utilisateur n'est pas identifi� : l'action renvoie un message d'erreur dans la page d'identification
// Sinon, il renvoie un message d'erreur dans la page d'accueil

// -------------------------------------------------------
// Recuperer les donnees d'entree n�cessaires a l'action
// -------------------------------------------------------

$etatActuel = $_SESSION['etat'];

// -------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

$_SESSION['message'] = "L'action que vous souhaitez faire n'est pas autoris�e !";

// -------------------------------------------------------
// Definir le nouvel etat de l'application
// -------------------------------------------------------

// On reste sur l'�tat actuel
$_SESSION['etat']= $etatActuel;

// -------------------------------------------------------
// Preparer les donnees de la vue resultante
// -------------------------------------------------------

// Donn�es structurelles de la vue dans tous les cas
$donneesVue['titre']=$titreApplication;
$donneesVue['zone_haute']=$vuesElementaires['vueElementaire_entete'];

switch ($etatActuel){
case 'etat_utilisateurNonIdentifie' : // si l'utilisateur n'est pas encore identifi�
	$donneesVue['zone_centrale']=$vuesElementaires['vueElementaire_identification'];
	$donneesVue['style']=$feuillesDeStyle['styleAvantIdentification'];
	break;
default : // sinon dans le cas ou il est identifi� on revient sur la page d'accueil
	$donneesVue['zone_navigation']=$vuesElementaires['vueElementaire_navigation'];
	$donneesVue['zone_messageSysteme']=$vuesElementaires['vueElementaire_messageSysteme'];
	$donneesVue['zone_principale']=$vuesElementaires['vueElementaire_accueil'];
	$donneesVue['style']=$feuillesDeStyle['styleApresIdentification'];
}
  
// Definition des donn�es dynamiques de la vue
$donneesVue['message'] = utf8_encode($_SESSION['message']);
$donneesVue['utilisateur']=$_SESSION['utilisateur'];
 
// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;

?> 
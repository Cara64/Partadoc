<?php

// Action effectué quand elle n'est pas autorisée
// Si l'utilisateur n'est pas identifié : l'action renvoie un message d'erreur dans la page d'identification
// Sinon, il renvoie un message d'erreur dans la page d'accueil

// -------------------------------------------------------
// Recuperer les donnees d'entree nécessaires a l'action
// -------------------------------------------------------

$etatActuel = $_SESSION['etat'];

// -------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

$_SESSION['message'] = "L'action que vous souhaitez faire n'est pas autorisée !";

// -------------------------------------------------------
// Definir le nouvel etat de l'application
// -------------------------------------------------------

// On reste sur l'état actuel
$_SESSION['etat']= $etatActuel;

// -------------------------------------------------------
// Preparer les donnees de la vue resultante
// -------------------------------------------------------

// Données structurelles de la vue dans tous les cas
$donneesVue['titre']=$titreApplication;
$donneesVue['zone_haute']=$vuesElementaires['vueElementaire_entete'];

switch ($etatActuel){
case 'etat_utilisateurNonIdentifie' : // si l'utilisateur n'est pas encore identifié
	$donneesVue['zone_centrale']=$vuesElementaires['vueElementaire_identification'];
	$donneesVue['style']=$feuillesDeStyle['styleAvantIdentification'];
	break;
default : // sinon dans le cas ou il est identifié on revient sur la page d'accueil
	$donneesVue['zone_navigation']=$vuesElementaires['vueElementaire_navigation'];
	$donneesVue['zone_messageSysteme']=$vuesElementaires['vueElementaire_messageSysteme'];
	$donneesVue['zone_principale']=$vuesElementaires['vueElementaire_accueil'];
	$donneesVue['style']=$feuillesDeStyle['styleApresIdentification'];
}
  
// Definition des données dynamiques de la vue
$donneesVue['message'] = utf8_encode($_SESSION['message']);
$donneesVue['utilisateur']=$_SESSION['utilisateur'];
 
// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;

?> 
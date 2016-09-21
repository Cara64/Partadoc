<?php

// Permet d'accéder à la page d'ajout de fichier


// -------------------------------------------------------
// Recuperer les donnees d'entree necessaires a l'action
// -------------------------------------------------------

// Pas de données nécessaires nécessaires

// -------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

$_SESSION['message'] = "Veuillez sélectionner le chemin pour votre fichier";
	
// -------------------------------------------------------
// Definir le nouvel etat de l'application
// -------------------------------------------------------

$_SESSION['etat']='etat_utilisateurIdentifieAjoutFichier';  

// -------------------------------------------------------
// Preparer les donnees de la vue resultante
// -------------------------------------------------------

  // Definition des donnees structurelles de la vue
$donneesVue['titre']=$titreApplication;
$donneesVue['zone_haute']=$vuesElementaires['vueElementaire_entete'];
$donneesVue['zone_navigation']=$vuesElementaires['vueElementaire_navigationAccueil'];
$donneesVue['zone_messageSysteme']=$vuesElementaires['vueElementaire_messageSysteme'];
$donneesVue['zone_principale']=$vuesElementaires['vueElementaire_pageAjout'];
$donneesVue['style']=$feuillesDeStyle['styleApresIdentification']; 
  
// Données dynamiques
$donneesVue['utilisateur'] = $_SESSION['utilisateur'];
$donneesVue['message'] = utf8_encode($_SESSION['message']);


// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;

?>  
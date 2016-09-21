<?php

// ACTION INITIALISER : Initialisation >> accès la page d'identification

// -------------------------------------------------------
// Recuperer les donnees d'entree nécessaires à l'action
// -------------------------------------------------------

// aucune donne necessaire

// -------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

// On nettoie les variables de session
$_SESSION=array();

// -------------------------------------------------------
// Definir le nouvel etat de l'application
// -------------------------------------------------------

$_SESSION['etat']='etat_utilisateurNonIdentifie';  

// -------------------------------------------------------
// Preparer les donnees de la vue resultante
// -------------------------------------------------------

// Definition des donnees structurelles de la vue
$donneesVue['titre']=$titreApplication;
$donneesVue['zone_haute']=$vuesElementaires['vueElementaire_entete'];
$donneesVue['zone_centrale']=$vuesElementaires['vueElementaire_identification'];
$donneesVue['style']=$feuillesDeStyle['styleAvantIdentification'];

// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;

?>  

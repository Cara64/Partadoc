<?php

// ACTION D'ACCES A LA PAGE D'ACCUEIL : Permet d'acc�der � la page d'accueil une fois que l'on est connect� (lorsqu'on se trouve sur la page d'historique ou la page d'ajout de fichier)

// -------------------------------------------------------
// Recuperer les donnees d'entree nessaires a l'action
// -------------------------------------------------------

// Pas de donn�es n�cessaires


// -------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

$_SESSION['message'] = "Bienvenue sur la page d'accueil";

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
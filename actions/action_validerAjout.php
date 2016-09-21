<?php
// -------------------------------------------------------
// Recuperer les donnees d'entree necessaires a l'action
// -------------------------------------------------------

$nomFichierAuploader = $_FILES['fichier']['name'];						// nom du fichier � uploader
$fichierTemporaire = $_FILES['fichier']['tmp_name'];					// nom du fichier temporaire upload�
$repertoirePartage = 'repertoirePartage/';								// adresse du r�pertoire de partage
$cheminFichierSurServeur = 'repertoirePartage/'.$nomFichierAuploader;	// chemin du fichier upload� dans le serveur
$dateOperation = date("d/m/Y H:i:s");									// date (JJ/MM/YYYY HH:mm:ss) � laquelle l'op�ration a �t� effectu�e
$user = $_SESSION['utilisateur']['login'];								// login de l'utilisateur connect�


// ---------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

// $cheminFichierSurServeur >> d�terminer si c'est un ajout ou un remplacement >> $operation, $_SESSION['message']
if (file_exists($cheminFichierSurServeur)){
	$operation = "Remplacement";
	$_SESSION['message'] = "Le fichier ".$nomFichierAuploader." a �t� remplac�";
} else {
	$operation = "Ajout";
	$_SESSION['message'] = "Le fichier ".$nomFichierAuploader." a �t� ajout�";
}

// $fichierTemporaire, $cheminFichierSurServeur, $user, $operation, $nomFichierAuploader, $dateOperation, $bd >> Finaliser l'upload et enregistrer dans l'historique >> $_SESSION['message']
if (is_uploaded_file($fichierTemporaire)){
	if (move_uploaded_file($fichierTemporaire, $cheminFichierSurServeur)){
		enregistrerHistorique($user, $operation, $nomFichierAuploader, $dateOperation, $bd);     
	} else {
		$_SESSION['message'] = "Impossible de copier dans le r�pertoire de partage";
	}
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

// Donn�es dynamiques de la vue
$donneesVue['message']=utf8_encode($_SESSION['message']);
$donneesVue['utilisateur']=$_SESSION['utilisateur'];

// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;
?>  
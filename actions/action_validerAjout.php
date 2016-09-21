<?php
// -------------------------------------------------------
// Recuperer les donnees d'entree necessaires a l'action
// -------------------------------------------------------

$nomFichierAuploader = $_FILES['fichier']['name'];						// nom du fichier à uploader
$fichierTemporaire = $_FILES['fichier']['tmp_name'];					// nom du fichier temporaire uploadé
$repertoirePartage = 'repertoirePartage/';								// adresse du répertoire de partage
$cheminFichierSurServeur = 'repertoirePartage/'.$nomFichierAuploader;	// chemin du fichier uploadé dans le serveur
$dateOperation = date("d/m/Y H:i:s");									// date (JJ/MM/YYYY HH:mm:ss) à laquelle l'opération a été effectuée
$user = $_SESSION['utilisateur']['login'];								// login de l'utilisateur connecté


// ---------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

// $cheminFichierSurServeur >> déterminer si c'est un ajout ou un remplacement >> $operation, $_SESSION['message']
if (file_exists($cheminFichierSurServeur)){
	$operation = "Remplacement";
	$_SESSION['message'] = "Le fichier ".$nomFichierAuploader." a été remplacé";
} else {
	$operation = "Ajout";
	$_SESSION['message'] = "Le fichier ".$nomFichierAuploader." a été ajouté";
}

// $fichierTemporaire, $cheminFichierSurServeur, $user, $operation, $nomFichierAuploader, $dateOperation, $bd >> Finaliser l'upload et enregistrer dans l'historique >> $_SESSION['message']
if (is_uploaded_file($fichierTemporaire)){
	if (move_uploaded_file($fichierTemporaire, $cheminFichierSurServeur)){
		enregistrerHistorique($user, $operation, $nomFichierAuploader, $dateOperation, $bd);     
	} else {
		$_SESSION['message'] = "Impossible de copier dans le répertoire de partage";
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

// Données dynamiques de la vue
$donneesVue['message']=utf8_encode($_SESSION['message']);
$donneesVue['utilisateur']=$_SESSION['utilisateur'];

// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;
?>  
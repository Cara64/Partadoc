<?php

// Permet d'acc�der � la consultation d'historique

// -------------------------------------------------------
// Recuperer les donnees d'entree necessaires a l'action
// -------------------------------------------------------

// Pas de donn�es n�cessaires

// -------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

// $bd >> On se connecte � la base de donn�es >> $connexion
$connexion = new PDO($dns, $bd['login'], $bd['motdepasse']);

// Construction de la requ�te � ex�cuter >> $requete
$requete = "SELECT utilisateur, operation, fichier, dateOperation FROM historique_partadoc";

// $requete >> Ex�cution de la requ�te >> $resultatRequete
$resultatRequete = $connexion->query($requete);
$resultatRequete->setFetchMode(PDO::FETCH_OBJ);

// $resultatRequete >> On compte le nombre de r�sultat >> $nbResultats
$nbResultat = $resultatRequete->rowCount();

// $resultatRequete, $nbResultat >> On transmet les r�sultats dans un tableau >> $tableauHistorique
for($i=0; $i<$nbResultat; $i++){
	
	// $resultatRequete >> R�cup�ration de toutes les donn�es d'une fiche >> $donneesHistorique
	$donneesHistorique = $resultatRequete->fetch();
	
	// $donneesHistorique >> M�morisation des donn�es dans un tableau >> $tableauHistorique
	$tableauHistorique[$i]['utilisateur'] = utf8_encode($donneesHistorique->utilisateur);
	$tableauHistorique[$i]['operation'] = utf8_encode($donneesHistorique->operation);
	$tableauHistorique[$i]['fichier'] = utf8_encode($donneesHistorique->fichier);
	$tableauHistorique[$i]['dateOperation'] = utf8_encode($donneesHistorique->dateOperation);
}

// D�connexion
$connexion = null;	

// Message syst�me � afficher
$_SESSION['message'] = "Liste des derni�res op�rations effectu�es";	

// -------------------------------------------------------
// Definir le nouvel etat de l'application
// -------------------------------------------------------

$_SESSION['etat']='etat_utilisateurIdentifieConsultationHistorique';  


// -------------------------------------------------------
// Preparer les donnees de la vue resultante
// -------------------------------------------------------

// Definition des donnees structurelles de la vue
$donneesVue['titre']=$titreApplication;
$donneesVue['zone_haute']=$vuesElementaires['vueElementaire_entete'];
$donneesVue['zone_navigation']=$vuesElementaires['vueElementaire_navigationHistorique'];
$donneesVue['zone_messageSysteme']=$vuesElementaires['vueElementaire_messageSysteme'];
$donneesVue['zone_principale']=$vuesElementaires['vueElementaire_consultationHistorique'];
$donneesVue['style']=$feuillesDeStyle['styleApresIdentification'];
  
// Definition des donn�es dynamiques de la vue
$donneesVue['nbResultat'] = $nbResultat;
$donneesVue['message'] = utf8_encode($_SESSION['message']);
if ($nbResultat != 0)
	$donneesVue['resultat'] = $tableauHistorique;
$donneesVue['utilisateur'] = $_SESSION['utilisateur'];
 
// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;

?>  
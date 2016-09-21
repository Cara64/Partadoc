<?php

// Permet d'accéder à la consultation d'historique

// -------------------------------------------------------
// Recuperer les donnees d'entree necessaires a l'action
// -------------------------------------------------------

// Pas de données nécessaires

// -------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

// $bd >> On se connecte à la base de données >> $connexion
$connexion = new PDO($dns, $bd['login'], $bd['motdepasse']);

// Construction de la requête à exécuter >> $requete
$requete = "SELECT utilisateur, operation, fichier, dateOperation FROM historique_partadoc";

// $requete >> Exécution de la requête >> $resultatRequete
$resultatRequete = $connexion->query($requete);
$resultatRequete->setFetchMode(PDO::FETCH_OBJ);

// $resultatRequete >> On compte le nombre de résultat >> $nbResultats
$nbResultat = $resultatRequete->rowCount();

// $resultatRequete, $nbResultat >> On transmet les résultats dans un tableau >> $tableauHistorique
for($i=0; $i<$nbResultat; $i++){
	
	// $resultatRequete >> Récupération de toutes les données d'une fiche >> $donneesHistorique
	$donneesHistorique = $resultatRequete->fetch();
	
	// $donneesHistorique >> Mémorisation des données dans un tableau >> $tableauHistorique
	$tableauHistorique[$i]['utilisateur'] = utf8_encode($donneesHistorique->utilisateur);
	$tableauHistorique[$i]['operation'] = utf8_encode($donneesHistorique->operation);
	$tableauHistorique[$i]['fichier'] = utf8_encode($donneesHistorique->fichier);
	$tableauHistorique[$i]['dateOperation'] = utf8_encode($donneesHistorique->dateOperation);
}

// Déconnexion
$connexion = null;	

// Message système à afficher
$_SESSION['message'] = "Liste des dernières opérations effectuées";	

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
  
// Definition des données dynamiques de la vue
$donneesVue['nbResultat'] = $nbResultat;
$donneesVue['message'] = utf8_encode($_SESSION['message']);
if ($nbResultat != 0)
	$donneesVue['resultat'] = $tableauHistorique;
$donneesVue['utilisateur'] = $_SESSION['utilisateur'];
 
// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;

?>  
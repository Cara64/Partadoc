<?php
  // ------ PARAMETRES DE L'APPLICATION ------
  // ------ Ces param�tres r�gulent le comportement de l'application ------


  // Configuration des MODELES DE VUE de l'application
  // Pour chaque mod�le de vue, on donne le nom et le fichier qui l'impl�mente
$modelesVues = array('modeleVue_avantIdentification' => 'modelesVues/modeleVue_avantIdentification.php',
		     'modeleVue_apresIdentification' => 'modelesVues/modeleVue_apresIdentification.php');

// Configuration des VUES ELEMENTAIRES de l'application
// Pour chaque vue �l�mentaire on donne son nom et le fichier qui l'impl�mente
$vuesElementaires = array('vueElementaire_entete' => 'vuesElementaires/vueElementaire_entete.html',
			  'vueElementaire_identification' => 'vuesElementaires/vueElementaire_identification.php',
			  'vueElementaire_navigationAccueil' => 'vuesElementaires/vueElementaire_navigationAccueil.php',
			  'vueElementaire_navigationHistorique' => 'vuesElementaires/vueElementaire_navigationHistorique.php',
			  'vueElementaire_messageSysteme' => 'vuesElementaires/vueElementaire_messageSysteme.php',
			  'vueElementaire_accueil' => 'vuesElementaires/vueElementaire_accueil.php',
			  'vueElementaire_pageAjout' => 'vuesElementaires/vueElementaire_pageAjout.html',
			  'vueElementaire_consultationHistorique' => 'vuesElementaires/vueElementaire_consultationHistorique.php'
			  );

// Feuille de style utilis�es pour la mise en forme des vues
$feuillesDeStyle = array(
			 'styleAvantIdentification' => 'feuillesDeStyle/styleAvantIdentification.css',
			 'styleApresIdentification' => 'feuillesDeStyle/styleApresIdentification.css'
			 );


// ACTIONS
// On d�finit l'action qui initialise l'application et l'action � d�clencher
// Si le contr�leur d�tecte une demande d'action interdite
// On liste ensuite l'ensemble des actions d�clenchables par l'utilisateur
// Pour chaque action on donne son nom et le fichier qui l'implemente
$action_initiale='action_initialiser';

$action_si_enchainement_invalide='action_enchainementInvalide';

$actions = array(
		 'action_initialiser'=>'actions/action_initialiser.php',
		 'action_seConnecter'=>'actions/action_seConnecter.php',
		 'action_ajouterFichier'=>'actions/action_ajouterFichier.php',
		 'action_accederAccueil'=>'actions/action_accederAccueil.php',
		 'action_validerAjout'=>'actions/action_validerAjout.php',
		 'action_consulterHistorique'=>'actions/action_consulterHistorique.php',
		 'action_enchainementInvalide'=>'actions/action_enchainementInvalide.php',
		 'action_supprimer' => 'actions/action_supprimer.php');


// ETATS
// On d�finit l'�tat initial de l'application puis
// Pour chaque �tat, on donne son nom et la liste des actions autoris�es
// lorsque l'application est dans cet �tat

$etat_initial ='etat_utilisateurNonIdentifie' ;

$etats = array() ;

$etats['etat_utilisateurNonIdentifie']= array('modeleVueAafficher'=>'modeleVue_avantIdentification',
					      'actionsAutorisees'=>array('action_initialiser', 'action_seConnecter'));

$etats['etat_utilisateurIdentifieAccueil'] = array('modeleVueAafficher'=>'modeleVue_apresIdentification', 
						   'actionsAutorisees'=>array('action_initialiser', 'action_supprimer', 'action_rapatrier', 'action_ajouterFichier', 'action_accederAccueil', 'action_consulterHistorique'));

$etats['etat_utilisateurIdentifieAjoutFichier'] = array('modeleVueAafficher'=>'modeleVue_apresIdentification',
														'actionsAutorisees'=>array('action_consulterHistorique', 'action_initialiser', 'action_validerAjout', 'action_accederAccueil', 'action_ajouterFichier'));

$etats['etat_utilisateurIdentifieConsultationHistorique'] = array('modeleVueAafficher'=>'modeleVue_apresIdentification',
																  'actionsAutorisees'=>array('action_initialiser', 'action_accederAccueil', 'action_consulterHistorique'));

// AUTRES PARAMETRES
// Param�tres de connexion � la base de donn�es
$bd = array('sgbd' => 'mysql',
	    'login' => 'root',
	    'motdepasse' => '',
	    'host' => 'localhost',
	    'nomBase' => 'testPartadoc');
$dns = $bd['sgbd'].':host='.$bd['host'].';dbname='.$bd['nomBase'];

// Titre g�n�ral de l'application
$titreApplication ='Partadoc';

// Configuration de l'affichage des erreurs/warning de php
// En phase de d�veloppement :
// ini_set("error_reporting", E_ALL^E_NOTICE); // afficher toutes les erreurs (E_All) sauf (^) les notices (E_NOTICE)

// En phase de release:
ini_set("error_reporting", 0);
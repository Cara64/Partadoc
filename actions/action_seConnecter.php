<?php

// ACTION DE CONNEXION : Se connecter à la page d'accueil
 
// -------------------------------------------------------
// Recuperer les donnees d'entree necessaires a l'action
// -------------------------------------------------------

$login = $_REQUEST['login'];	// login de l'utilisateur
$mdp = md5($_REQUEST['mdp']);	// mot de passe haché en MD5


// ---------------------------------------------------------
// Executer l'action
// ---------------------------------------------------------

// On se connecte à la base de donnée >> $connexion
$connexion = new PDO($dns, $bd['login'], $bd['motdepasse']);

// $login, $motdepasse >> On vérifie si l'identifiant et le mot de passe sont corrects >> $requete
// L'utilisation de requête préparé permet de se protéger des injections SQL
$requete = $connexion->prepare('SELECT * FROM utilisateurs_partadoc WHERE login LIKE ? AND motDePasse LIKE ?');

// On veut récupérer le résultat sous forme d'objet
$requete->setFetchMode(PDO::FETCH_OBJ);

// $requete, $login, $mdp >> Exécution de la requête préparée >> $requete
$requete->execute(array($login, $mdp));

// $requete >> Récupérer le tuple résultat >> $identifiant
$identifiant = $requete->fetch();

// $identifiant >> Récupérer les informations de l'utilisateur (si succès) >> $utilisateur
if ($identifiant){
  $utilisateur['login'] = utf8_encode($identifiant->login);
  $utilisateur['nom'] = utf8_encode($identifiant->nom);
  $utilisateur['prenom'] = utf8_encode($identifiant->prenom);
  
  $_SESSION['utilisateur'] = $utilisateur;
  $_SESSION['message'] = "Bienvenue sur la page d'accueil";
}
else // si échec : on affiche un message d'erreur
  $_SESSION['message'] = "Identifiants incorrects";
  
// Déconnexion
$connexion = null;

// -------------------------------------------------------
// Definir le nouvel etat de l'application
// -------------------------------------------------------

if($identifiant) // si identification, alors l'utilisateur accède à la page d'accueil
  $_SESSION['etat']='etat_utilisateurIdentifieAccueil'; 
else // sinon revient à la page d'identification
  $_SESSION['etat']='etat_utilisateurNonIdentifie';

// -------------------------------------------------------
// Preparer les donnees de la vue resultante
// -------------------------------------------------------

// Structure de la vue résultante dans tout cas
$donneesVue['titre'] = $titreApplication;
$donneesVue['zone_haute'] = $vuesElementaires['vueElementaire_entete'];

// Structure de la vue résultante selon les cas
switch ($_SESSION['etat']){
  // Si l'identification a réussie
case 'etat_utilisateurIdentifieAccueil':
  // Structure de la vue résultante
  $donneesVue['zone_navigation']=$vuesElementaires['vueElementaire_navigationAccueil'];
  $donneesVue['zone_messageSysteme']=$vuesElementaires['vueElementaire_messageSysteme'];
  $donneesVue['zone_principale']=$vuesElementaires['vueElementaire_accueil'];
  $donneesVue['style']=$feuillesDeStyle['styleApresIdentification'];
  // Données dynamiques de la vue
  $donneesVue['utilisateur']=$_SESSION['utilisateur'];
  break;
  // Si l'identification a échouée
default:
  // Structure de la vue résultante
  $donneesVue['zone_centrale']=$vuesElementaires['vueElementaire_identification'];
  $donneesVue['zone_messageSysteme']=$vuesElementaires['vueElementaire_messageSysteme'];
  $donneesVue['style']=$feuillesDeStyle['styleAvantIdentification'];
}

// Données dynamiques de la vue dans tout cas
$donneesVue['message'] = utf8_encode($_SESSION['message']);

// Enregistrement des donnees de la vue dans la session
$_SESSION['donneesVue']=$donneesVue;

?>
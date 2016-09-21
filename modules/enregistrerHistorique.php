<?php
// Fonction qui permet d'ajouter dans la table historique_partadoc les informations relatives aux opérations

function enregistrerHistorique($idUtilisateur, $nomOperation, $nomFichier, $dateOperation, $bd){
  // $bd >> Connexion à la bd >> $connexion
  $sgbd=$bd['sgbd'];
  $nomBase=$bd['nomBase'];
  $dns = $sgbd.':host='.$bd['host'].';dbname='.$nomBase;
  $connexion = new PDO($dns, $bd['login'], $bd['motdepasse']);

  // $idutilisateur >> On récupère le nom et le prénom de l'utilisateur >> $nomUtilisateur, $prenomUtilisateur
  $requetePrepare = $connexion->prepare('SELECT nom, prenom FROM utilisateurs_partadoc WHERE login = ?');
  
  // Récupération sous forme d'objets
  $requetePrepare->setFetchMode(PDO::FETCH_OBJ);
  
  // On exécute la requête
  $requetePrepare->execute(array($idUtilisateur));
  
  // $requetePrepare >> On récupère les informations nécessaires >> $resultat, $utilisateur
  $resultat = $requetePrepare->fetch();
  $utilisateur['Nom'] = $resultat->nom;
  $utilisateur['Prenom'] = $resultat->prenom;
  $utilisateurAajouter = $utilisateur['Prenom']." ".$utilisateur['Nom'];
  
  // $utilisateur, $nomOperation, $nomFichier, $dateOperation >> On insère l'opération dans l'historique >> $ajout
  $requete = "INSERT INTO historique_partadoc VALUES(null,'$utilisateurAajouter', '$nomOperation', '$nomFichier',' $dateOperation')";
  $ajout=$connexion->exec($requete);
  
  // $connexion >> Deconnexion
  $connexion = null;
 }
?>
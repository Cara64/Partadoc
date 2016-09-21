<?php
// Fonction qui permet d'ajouter dans la table historique_partadoc les informations relatives aux op�rations

function enregistrerHistorique($idUtilisateur, $nomOperation, $nomFichier, $dateOperation, $bd){
  // $bd >> Connexion � la bd >> $connexion
  $sgbd=$bd['sgbd'];
  $nomBase=$bd['nomBase'];
  $dns = $sgbd.':host='.$bd['host'].';dbname='.$nomBase;
  $connexion = new PDO($dns, $bd['login'], $bd['motdepasse']);

  // $idutilisateur >> On r�cup�re le nom et le pr�nom de l'utilisateur >> $nomUtilisateur, $prenomUtilisateur
  $requetePrepare = $connexion->prepare('SELECT nom, prenom FROM utilisateurs_partadoc WHERE login = ?');
  
  // R�cup�ration sous forme d'objets
  $requetePrepare->setFetchMode(PDO::FETCH_OBJ);
  
  // On ex�cute la requ�te
  $requetePrepare->execute(array($idUtilisateur));
  
  // $requetePrepare >> On r�cup�re les informations n�cessaires >> $resultat, $utilisateur
  $resultat = $requetePrepare->fetch();
  $utilisateur['Nom'] = $resultat->nom;
  $utilisateur['Prenom'] = $resultat->prenom;
  $utilisateurAajouter = $utilisateur['Prenom']." ".$utilisateur['Nom'];
  
  // $utilisateur, $nomOperation, $nomFichier, $dateOperation >> On ins�re l'op�ration dans l'historique >> $ajout
  $requete = "INSERT INTO historique_partadoc VALUES(null,'$utilisateurAajouter', '$nomOperation', '$nomFichier',' $dateOperation')";
  $ajout=$connexion->exec($requete);
  
  // $connexion >> Deconnexion
  $connexion = null;
 }
?>
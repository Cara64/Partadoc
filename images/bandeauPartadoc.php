<?php
header("Content-type: image/png");

// Definition taille >> LARGEUR, HAUTEUR, TAILLEPOLICE
const LARGEUR = "300";
const HAUTEUR = "90";
const TAILLEPOLICE = "60";

// LARGEUR, HAUTEUR >> Creation de l'image >> img, fondImage
$img = ImageCreateTrueColor(LARGEUR, HAUTEUR);
$fondImage = ImageColorAllocate($img, 255, 255, 255);
ImageColorTransparent($img, $fondImage);
ImageFill($img, 0, 0, $fondImage); 

// Ecriture de la police
$x = 5; // positionnement abscisse (bas à gauche du texte)
$y = HAUTEUR/2+HAUTEUR/3; // positionnement ordonnée (bas à gauche du texte)
$color = ImageColorAllocate($img, 0, 17, 138); // couleur bleu
$shadowColor = ImageColorAllocate($img, 10, 10, 10); // pour ombre noir
$fontLogo = '../feuillesDeStyle/font/Lobster.otf'; // police logo
$text = 'Partadoc';
imagefttext($img, TAILLEPOLICE, 0, $x, $y, $shadowColor, $fontLogo, $text); // ombre
imagefttext($img, TAILLEPOLICE, 0, $x+1, $y+1, $color, $fontLogo, $text); // principal
ImagePNG($img);
ImageDestroy($img);
?>




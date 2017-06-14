<?php
// Traitements
// Récupérer les données
// Ici: UN produit
include("inc/data.php");

// Si l'index qui nous est fourni en param GET
//  - n'est pas fourni
// pas la peine de chercher un produit
if(!isset($_GET["index"])) {
	// s'il y a une erreur on redirige vers l'accueil
	// echo 'header("Location: index.php")';
	header("Location: index.php");
}

// Il nous faut l'info "quel produit?"
// Pour récupérer cette info depuis une autre page, on passe l'index
// du produit qu'on veut afficher dans un parametre GET dans l'URL
$index = $_GET["index"];


// Si il n'y a pas de produit qui correspond à cet index
//  - parce que l'index n'est pas numérique
//  - ou parce que il n'y a pas de product à cet index dans le tableau
// rien à afficher
if(!isset($products[$index])) {
	header("Location: index.php");
}

// On récupère les infos du produit concerné dans le tableau $produits
$product = $products[$index];

// Présentation
// C'est une page "normale" de ma boutique cad elle a un header et un footer
// appeler le template qui présente le détail d'un produit
include("templates/header.php");
include("templates/product-single.php");
include("templates/footer.php");
?>

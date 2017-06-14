<?php
include("inc/data.php");
// cart: script qui va gérer l'ajout d'un produit dans le panier
session_start();

// Exemple ici, on teste d'abord si la variable est définie
// PUIS si elle vaut 2
// isset() nous permet de savoir si une $variable est définie
// Et d'éviter une notice PHP en message d'erreur
if(isset($var) && $var == 2) {

}

// Méthode alternative via GET pour vider le panier
if(isset($_GET['vider'])) {
	// On reset notre index cart du tableau session (on vide notre panier)
	// Attention unset rend la variable indéfinie (non existante)
	unset($_SESSION['cart']);
}

// pour "ajouter un produit dans le panier"
// - j'ai besoin d'une variable qui va stocker le contenu de mon panier
// OU
// On vide le panier si le bouton "cart-empty" a été cliqué
// c'est-à-dire que le paramètre 'cart-empty' a bien été passé en POST
// depuis le formulaire "Vider le panier"
// Attention, si vous utilisez session_unset(), vous supprimez toute la session
// Et eventuellement d'autres choses que le panier ! Ce n'est pas souhaitable
if(!isset($_SESSION["cart"]) || isset($_POST['cart-empty'])) {
	$_SESSION["cart"] = [];
}

/*
- j'ai aussi besoin des infos du produit à stocker
- quel est le produit que je veux ajouter?
<==> sur quel bouton on a cliqué? => je dois récupérer un index
$_GET["index"] ? Non, car on va faire une opération d'écriture (enregistrement sur le server), pas de lecture
DONC $_POST
*/
/* Forme du panier:
1 ligne = [index, title, price]
*/
// si l'index du produit à ajouter a bien été envoyé en POST
if(isset($_POST["product-index"])) {
    // si la valeur est correcte
    // cad si le produit existe bien dans ma liste
    if(isset($products[$_POST["product-index"]])) {
		// index de notre produit
		$productId = $_POST["product-index"];
        // le produit qu'on veut ajouter au panier est valide
        $productToAdd = $products[$productId];

		// Pour gérer les quantités, on vérife d'abord si le produit est dans le panier
		if(isset($_SESSION['cart'][$productId])) {
			// On ajoute 1 à la quantité existante
			$_SESSION['cart'][$productId]['quantity'] += 1;
		}
		else {
	        // on enregistre l'ajout dans la session
			// à l'index qui correspond à l'identifiant du produit
			// Au lieu d'avoir un tableau avec des index 0, 1, 2, 3, 4
			// on aura un tableau avec des index 2, 5, 1, 3, 8
			// OU encore
			// on remplace l'indice du tableau par l'id du produit,
			// ce qui ecrase l'ancienne indice au chargement
			// (donc pas de ligne supplémentaire pour 1 meme product)
	        $_SESSION["cart"][$productId] = [
	            "index" => $_POST["product-index"],
	            "title" => $productToAdd["title"],
	            "price" => $productToAdd["promo_price"],
				// Quand on ajoute le produit, on défini sa quantité à 1
				"quantity" => 1,
	        ];
		}
    }
}

//
// echo "<pre>";
// var_dump($_SESSION["cart"]);
// echo "</pre>";

// je range le contenu de mon panier (qui est stocké en session)
// dans une variable $cart
// qui est ainsi disponible pour être manioulée dans mon template cart-list
$cart = $_SESSION["cart"];

// Afin de séparer les traitements de l'affichage
// On calcule notre total ici
$total = 0; // Mon total de départ = 0
// On parcourt tous les articles du panier
foreach($cart as $product) {
	// On ajoute le prix de chauque article au total
	$total += $product['price'] * $product['quantity']; // équivaut à $total = $total + $product['price'];
}

// fin des traitement du script,
// on passe à la présentation

include("templates/header.php");
include("templates/cart-list.php");
include("templates/footer.php");

?>

<?php
// traitements / données
/*
require : provoquera erreur php & pas d'affichage de la boutique
vs include : nous permet d'éxécuter / afficher tout de même la boutique
si on a pas d'articles / si on trouve pas le fichier qui contient les articles
_once : superflu car si on appelle 2 fois le script ça redéclare seulement la variable.
*/
include("inc/data.php");

// Si on a bien un index de produit via POST
if(isset($_POST['product-index'])) {
    // On se crée une variable product qui contient le produit recherché
    $product = $products[$_POST['product-index']];
}
else {
    // Sinon on redirige vers la page d'accueil
    // header (Location:page) renvoie le nav vers la page en question
    header('Location: index.php');
    exit;
}

// Erreur liées à mon formulaire
// On crée un tableau qui va stocker les erreurs de notre formulaire
$errors = [];
// A-t-on cliqué sur le bouton envoyer "contact-send" du form?
// Dans le cas où on arrive de la page produit, on ne rentre pas dans ce bloc
if(isset($_POST['contact-send'])) {
    // Je vérifie que ma variable n'est pas vide
    if(empty($_POST['name'])) {
        $errors[] = 'Je ne sais même pas comment tu t\'appelle !!';
    }
    elseif (strlen($_POST['name']) <= 3) {
        $errors[] = 'Tu as dû oublier des lettres dans ton nom ! '.' '.$_POST['name'];
    }

    if(strlen($_POST['prenom']) <= 2) {
        $errors[] = 'Te serais-tu trompé dans ton prénom ? : '.$_POST['prenom'];
    }

    if(empty($_POST['email'])) {
        $errors[] = 'C\'est quoi ton adresse mail ?';
    }
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Tu t\'es trompé dans ton mail... : '.$_POST['email'];
    }


    if(empty($_POST['paires'])) {
        $errors[] = 'Faudrait nous dire combien tu en veux !';
    }
    elseif (!filter_var($_POST['paires'], FILTER_VALIDATE_INT)) {
        $errors[] = 'Désolé, mais on ne les fait que par paire ! : '.$_POST['paires'];
    }
}


include("templates/header.php");
if(isset($_POST['contact-send']) && empty($errors))
{
    include("templates/message-sent.php");
} else {
    include("templates/contact-form.php");
}
include("templates/footer.php");

?>

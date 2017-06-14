<div id="product">
    <div id="product-summary">
        <h1 id="product-title" class="titre"><?= $product["title"] ?></h1>
        <p id="product-price">
            <?php if($product["price"] == $product["promo_price"]): ?>
                <span class="product-price-real"><?= number_format($product["price"], 2) ?> €</span>
            <?php else: ?>
                <del class="product-price-old"><?= number_format($product["price"], 2) ?> €</del>
                <ins class="product-price-real"><?= number_format($product["promo_price"], 2) ?> €</ins>
            <?php endif; ?>
        </p>
        <p id="product-short"><?= $product["short_desc"] ?>... <a id="product-link" href="#product-details">En savoir plus</a></p>

		<!-- bouton d'ajout au panier
		doit envoyer product-index en POST au script cart.php
		DONC il doit êter inclus dans un formulaire -->
		<form action="cart.php" method="post">
            <!-- ce champ est de type "hidden", on ne le montre pas à l'utilisateur
            et celui ci ne saisira rien dedans.
            on utilise ce champ pour transmettre via POST une info supplémentaire:
            l'index du produit qu'on veut ajouter au panier -->
            <input
                type="hidden"
				name="product-index"
				value="<?= $index ?>"
            />
	        <input
				type="submit"
				id="product-add"
				class="product-add"
                value="Ajouter au panier"
			/>
		</form>

	</div>
    <img id="product-image" src="images/<?= $product["picture"] ?>" alt="">
    <div id="product-details">
        <h2 class="product-detail titre">Détails</h2>
        <p id="product-desc"><?= $product["long_desc"] ?></p>
        <h2 class="product-detail titre">Prix</h2>
        <?php if($product["price"] == $product["promo_price"]): ?>
            <span class="product-price-real"><?= number_format($product["price"], 2) ?> €</span>
        <?php else: ?>
            <del class="product-price-old"><?= number_format($product["price"], 2) ?> €</del>
            <ins class="product-price-real"><?= number_format($product["promo_price"], 2) ?> €</ins>
        <?php endif; ?>
        <form action="contact.php" method="post">
          <input type="hidden" name="product-index" value="<?= $index ?>">
          <input type="submit" class="product-add" value="Demande d'informations">
        </form>
    </div>
</div>

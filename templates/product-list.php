<main id="products">
    <?php
    foreach ($products as $id => $product) {
      $link = "product.php?index=$id";
    ?>
        <article class="product">
            <a class="product-link" href="<?= $link ?>">
              <h2 class="product-name"><?= $product["title"] ?></h2>
              <img class="product-image" src="images/<?= $product["thumbnail"] ?>" alt="<?= $product["short_desc"] ?>">
            </a>
            <p class="product-desc"><?= $product["short_desc"] ?></p>
            <p class="product-price">
            <?php if($product["price"] == $product["promo_price"]): ?>
                <span class="product-price-real"><?= number_format($product["price"], 2) ?> €</span>
            <?php else: ?>
                <del class="product-price-old"><?= number_format($product["price"], 2) ?> €</del>
                <ins class="product-price-real"><?= number_format($product["promo_price"], 2) ?> €</ins>
            <?php endif; ?>
            </p>
            <p class="product-infos">
                <a class="product-see" href="<?= $link ?>">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <span class="product-see-text">Voir le produit</span>
                </a>
                <form action="cart.php" method="post">
                    <input type="hidden" name="product-index" value="<?= $id ?>" />
        	        <input type="submit" class="product-add" value="Ajouter au panier" />
                    <!-- button type="submit" name="product-index" value="<?= $id ?>">Ajouter au panier</button -->
        		</form>

            </p>
        </article>
    <?php
    }
    ?>
</main>

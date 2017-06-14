<main>
	<h2>Votre panier</h2>

	<!-- vider le panier via POST -->
	<form action="cart.php" method="post">
		<input type="submit" name="cart-empty" value="Vider le panier (POST, recommandée)">
    </form>
	<!-- méthoed alternative via GET -->
	<a href="cart.php?vider=1">Vider le panier (GET)</a>

	<!-- on crée d'abord la structure HTML attendue -->
	<table>
		<thead>
			<tr>
				<th>Réf.</th>
				<th>Produit</th>
				<th>Quantité</th>
				<th>Prix unitaire</th>
				<th>Total article</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3"></td>
				<td>Total</td>
				<td><?= number_format($total, 2) ?> &euro;</td>
			</tr>
		</tfoot>
		<tbody>
			<!-- on veut boucler sur ctte partie -->
			<?php foreach ($cart as $product) : ?>
			<tr>
				<td><?= $product["index"] ?></td>
				<td><?= $product["title"] ?></td>
				<td><?= $product["quantity"] ?></td>
				<td><?= number_format($product["price"], 2) ?> &euro;</td>
				<td><?= number_format($product["price"] * $product['quantity'], 2) ?> &euro;</td>
			</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</main>

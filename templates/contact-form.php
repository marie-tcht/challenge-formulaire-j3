<main id="contact">
    <h2>Demande d'informations</h2>

    <ul class="errors">
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>

    <p>Je souhaite plus d'informations sur :</p>
    <img src="images/<?= $product["picture"] ?>" alt="">
    <form action="contact.php" method="post">
        <div>
            <label for="">Produit concerné</label>
            <input type="text" name="title" value="<?= $product['title'] ?>"disabled="disabled">
        </div>
        <div>
            <label for="">Votre nom (*)</label>
            <input type="text" name="name" value="">
        </div>
        <div>
            <label for="">Votre prénom</label>
            <input type="text" name="prenom">
        </div>
        <div>
            <label for="">Votre e-mail (*)</label>
            <input type="text" name="email" value="">
        </div>
        <div>
            <label for="">Votre pointure</label>
            <select name="pointure">
                <?php for($p = 36;$p <= 46;$p++ ) : ?>
                <option value="<?= $p ?>" selected="selected"><?= $p ?></option>
                <?php endfor ?>
            </select>
        </div>
        <div>
            <label for="">Nb de paires (*)</label>
            <input type="text" name="paires" value="">
        </div>
        <div>
            <label for="">Message</label><br>
            <textarea name="message" rows="5" cols="60" placeholder="Vous voulez en faire quoi de vos chaussons ?"></textarea>
        </div>
        <div>
            <input type="hidden" name="product-index" value="<?= $_POST['product-index'] ?>">
            <input type="submit" name="contact-send" value="Envoyer">
        </div>
    </form>
</main>

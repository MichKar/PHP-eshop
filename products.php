<div class="products">
    <?php foreach ($products as $id => $product): ?>
        <div class="product">
            <h3><?= $product["name"]; ?></h3>
            <p class="product-introduction"><?= $product["introduce"]; ?></p>
            <div class="item-picture"><img src="<?= $product["picture"]; ?>" alt=""></div>
            <p class="price"><?= number_format($product["price"], 0, '', ' '); ?> Kč</p>
            <form method="POST" action="index.php">
                <input type="hidden" name="product_id" value="<?= $id; ?>">

                <button type="submit" class="btn" name="action" value="add-to-cart">Přidat do košíku</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
</div>
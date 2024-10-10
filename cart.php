    <?php $sum = 0;

    if (!empty($_SESSION["cart"])): ?>
        <h2 class="header-cart">Váš košík</h2>
        <div class="table-cart">
            <?php foreach ($_SESSION["cart"] as $id => $quantity): ?>
                <form method="POST" action="index.php">
                    <div class="one-cart-item">
                        <div class="cart-icon">
                            <img src="<?= $products[$id]['picture']; ?>" style=" height: 100%; width: auto;">
                        </div>
                        <div class="cart-name"><?= $products[$id]["name"]; ?></div>
                        <div class="cart-price-1"><?= number_format($products[$id]["price"], 0, '', ' '); ?> Kč/ks</div>
                        <input type="hidden" name="product_id" value="<?= $id; ?>">
                        <div class="quantity">
                            <div class="quantity-nr"><?= $quantity; ?> ks</div>
                            <div class="btns-quantity"><button type="submit" name="action" value="add-to-cart" class="btn-counter">▲</button>
                                <button type="submit" name="action" value="remove-from-cart" class="btn-counter">▼</button>
                            </div>
                        </div>
                        <div class="cart-price-all"><?= number_format($products[$id]["price"] * $quantity, 0, '', ' '); ?> Kč</div>
                        <div>
                            <button class="btn-bin" type="submit" name="action" value="delete-from-cart"><img src="bin.png" width="40px" alt=""></button>
                        </div>
                    </div>
                </form>
            <?php $sum += $products[$id]["price"] * $quantity;
            endforeach; ?>
            <div class="one-cart-item cart-sum">
                <div>Celkem</div>
                <div class=" cart-sum-value"><?= number_format($sum, 0, '', ' '); ?> Kč</div>
                <form method="POST" action="index.php">
                    <button class="btn-bin" type="submit" name="action" value="delete-all"><img src="bin.png" width="40px" alt="objednat"></button>
                </form>
            </div>
        </div>

        <!-- tlačítko objednat -->
        <form method="POST" action="index.php">
            <button type="submit" class="order-button" name="action" value="order">
                <p>Objednat</p><img src="paper-plane.png" style="width: 40px; height: 30px;">
            </button>
        </form>

    <?php else: ?>
        <h2 class="header-cart">Váš košík je zatím prázdný..</h2>
    <?php endif; ?>
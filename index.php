<?php
session_start();
include_once("list-of-items.php");

// Funkce pro přidání položky do košíku
function addToCart($product_id)
{
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += 1;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

// Funkce pro odebrání položky z košíku
function removeFromCart($product_id)
{
    if (isset($_SESSION['cart'][$product_id]) && $_SESSION['cart'][$product_id] > 1) {
        $_SESSION['cart'][$product_id] -= 1;
    } else {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Funkce pro odstranění položky z košíku
function deleteFromCart($product_id)
{
    unset($_SESSION['cart'][$product_id]);
}

// Zpracování požadavku
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $product_id = $_POST['product_id'] ?? null;

    switch ($_POST['action']) {
        case 'add-to-cart':
            if ($product_id) {
                addToCart($product_id);
            }
            break;
        case 'remove-from-cart':
            if ($product_id) {
                removeFromCart($product_id);
            }
            break;
        case 'delete-from-cart':
            if ($product_id) {
                deleteFromCart($product_id);
            }
            break;
        case 'delete-all':
            unset($_SESSION['cart']);
            break;
        default:
            break;
    }

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <div class="container">
            <div class="header">
                <a class="tecnifibre" href="index.php"><img class="logo" src="https://logowik.com/content/uploads/images/tecnifibre7996.logowik.com.webp"></a>
                <div>
                    <a class="icon-cart" href="#cart-section"><img src="cart.png" alt="ikona košíku" style="width: 50px; height: 100%; padding: 10px;"></a>
                    <a class="icon-contact" href="#contact-section"><img src="location.png" alt="ikona kontakt" style="width: 50px; height: 100%; padding: 10px;"></a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <h1 class=container>Vítejte na mém fiktivním tenisovém e-shopu</h1>

        <section id="product-section">
            <div class="container">
                <?php require_once("products.php");   ?>
            </div>
        </section>

        <section id="cart-section">
            <div class="container">
                <?php require_once("cart.php");   ?>
            </div>
        </section>

        <section class="container" id="contact-section">
            <img class="contact-image" src="location.png">
            <div>
                <h2 class="header-contact">Kontakt</h2>
                <p>Tel: XXX XXX XXX
                <p>
                <p>Email: fiktivni-web@eshop.cz</p>
                <p>Adresa: Fiktivní ulice 145, Fiktivnov 000 00</p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 - Vytvořila Michaela Karafiátová</p>
        </div>
    </footer>

</body>

</html>
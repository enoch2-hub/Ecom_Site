<?php
// cart.php
session_start();

if ($_GET['action'] == 'add') {
    $id = $_GET['id'];
    $_SESSION['cart'][$id] = 1;
}

$cart_items = [];
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $quantity) {
        $cart_items[] = getProduct($id);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart - E-commerce</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Shopping Cart</h1>
    <div class="cart-items">
        <?php foreach ($cart_items as $item): ?>
            <div class="cart-item">
                <img src="img/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                <h2><?php echo $item['name']; ?></h2>
                <p>$<?php echo $item['price']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

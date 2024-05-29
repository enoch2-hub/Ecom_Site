<?php
// cart.php
session_start();

// Check if action is 'add' and add item to cart if needed
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $id = $_GET['id'];
    $_SESSION['cart'][$id] = 1;
}

$cart_items = [];

// Check if cart is not empty
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $quantity) {
        $cart_items[] = getProduct($id);
    }
}

// Check if action is not set and cart is empty
if (!isset($_GET['action']) && empty($_SESSION['cart'])) {
    // Redirect to another HTML page or include another HTML content
    // header("Location: index.php?page=cart-empty.php");
    header("Location: pages/cart-empty.php");
    exit; // Stop further execution
}

// Remove item from cart
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart - TS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php?page=home" style="text-decoration:none">
            <h1 class='font3'>T S</h1>
        </a>
        <div class="navlinks">
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=products">Products</a>
            <a href="index.php?page=cart">Cart</a>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="index.php?page=profile">
                    <img src="img/<?php echo $_SESSION['user']['profile_pic']; ?>" alt="Profile Picture" class="profile-pic">
                    <?php echo $_SESSION['user']['username']; ?>
                </a>
                <a href="index.php?page=logout">Logout</a>
            <?php else: ?>
                <a href="index.php?page=login">Login</a>
                <a href="index.php?page=register">Register</a>
            <?php endif; ?>
        </div>
    </div>

    <h1>Shopping Cart</h1>
    <div class="cart-items">
    <?php if (empty($cart_items)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <?php foreach ($cart_items as $item): ?>
            <div class="cart-item">
                <img src="img/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                <h2><?php echo $item['name']; ?></h2>
                <p>$<?php echo $item['price']; ?></p>
                <a href="index.php?page=cart&action=remove&id=<?php echo $item['id']; ?>">
                    <i class="fa fa-trash-o" style="font-size:24px; color:red; 
                        background-color:#fff; border-radius: 50%; padding: 5px; cursor: pointer; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.30);">
                    </i>
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <a href="index.php?page=products">Continue Shopping</a>

    </div>
</body>
</html>

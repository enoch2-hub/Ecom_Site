<?php
// product.php
include_once 'includes/functions.php';
$product = getProduct($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?> - E-commerce</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
                <a href="index.php?page=logout">Logout</a>
                <a href="index.php?page=profile">
                    <span class="username"><?php echo $user[0];?></span>
                </a>
            <?php else: ?>
                <a href="index.php?page=login">Login</a>
                <a href="index.php?page=register">Register</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="product-single">
        <h1><?php echo $product['name']; ?></h1>
        <img src="img/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <p><?php echo $product['description']; ?></p>
        <p>$<?php echo $product['price']; ?></p>
        <a href="index.php?page=cart&action=add&id=<?php echo $product['id']; ?>">Add to Cart</a>
    </div>
</body>
</html>

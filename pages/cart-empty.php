

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart - TS</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php?page=home" style="text-decoration:none">
            <h1 class='font3'>T S</h1>
        </a>
        <div class="navlinks">
            <a href="../index.php?page=home">Home</a>
            <a href="../index.php?page=products">Products</a>
            <a href="../index.php?page=cart">Cart</a>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="../index.php?page=profile">
                    <img src="../img/<?php echo $_SESSION['user']['profile_pic']; ?>" alt="Profile Picture" class="profile-pic">
                    <?php echo $_SESSION['user']['username']; ?>
                </a>
                <a href="../index.php?page=logout">Logout</a>
            <?php else: ?>
                <a href="../index.php?page=login">Login</a>
                <a href="../index.php?page=register">Register</a>
            <?php endif; ?>
        </div>
    </div>

    <h1 class='font1'>Shopping Cart</h1>
    <div class="cart-items">
    <?php if (empty($cart_items)): ?>
        <p>Your cart is empty.</p>
        <a href="../index.php?page=products">Continue Shopping</a>
    <?php else: ?>
        <?php foreach ($cart_items as $item): ?>
            <div class="cart-item">
                <img src="img/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                <h2><?php echo $item['name']; ?></h2>
                <p>$<?php echo $item['price']; ?></p>
                <a href="index.php?page=cart&action=remove&id=<?php echo $item['id']; ?>">Remove</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</body>
</html>

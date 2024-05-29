<?php
// home.php
session_start();

include_once 'includes/functions.php';
$products = getProducts();

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $user       = $_SESSION['username'];
    $loggedin   = true;
    $userstr    = "Logged in as $user";
} else {
    $loggedin = false;
    // Redirect to login page or handle as needed
    // header("Location: index.php?page=home");
    // exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home - E-commerce</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <!-- <h1>Welcome to our Tech Store</h1> -->
    <div class="navbar">
        <h1>T S</h1>
        <div class="navlinks">
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=products">Products</a>
            <a href="index.php?page=cart">Cart</a>
            <?php if ($loggedin): ?>
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

    


    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="img/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['description']; ?></p>
                <p>$<?php echo $product['price']; ?></p>
                <a href="index.php?page=product&id=<?php echo $product['id']; ?>">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

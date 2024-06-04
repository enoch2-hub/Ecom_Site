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
    <title>Products - TS</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <!-- <h1>Welcome to our Tech Store</h1> -->
    <?php require_once 'partials/navbar.php'; ?>
    

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

<?php
// home.php
include_once 'includes/functions.php';
$products = getProducts();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home - E-commerce</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <!-- <h1>Welcome to our Tech Store</h1> -->
    <h1>T S</h1>
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

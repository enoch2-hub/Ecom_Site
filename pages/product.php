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
    <div class="product-single">
        <h1><?php echo $product['name']; ?></h1>
        <img src="img/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <p><?php echo $product['description']; ?></p>
        <p>$<?php echo $product['price']; ?></p>
        <a href="index.php?page=cart&action=add&id=<?php echo $product['id']; ?>">Add to Cart</a>
    </div>
</body>
</html>

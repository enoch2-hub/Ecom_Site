<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tech Store</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php?page=home" style="text-decoration:none">
            <h1 class='font3'>T S<div class="font2">Tech Store</div></h1>
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

    <div class="carousel">
        <div class="carousel-slide">
            <img src="img/carousel/01.jpg" class="carousel-image">
        </div>
        <div class="carousel-slide">
            <img src="img/carousel/02.jpg" class="carousel-image">
        </div>
        <div class="carousel-slide">
            <img src="img/carousel/03.jpg" class="carousel-image">
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>






    <div class="ad-section-main">
        <div class="ad-section1">
            <div class="ad">
                <img src="img/carousel/04.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/05.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/06.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/07.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/08.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/09.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/04.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/05.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/06.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/07.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/08.jpg" class="carousel-image">
            </div>
            <div class="ad">
                <img src="img/carousel/09.jpg" class="carousel-image">
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>

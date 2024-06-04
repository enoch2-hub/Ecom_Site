<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>        
        function toggleDrawer() {
            document.querySelector('.navbar').classList.toggle('open');
        }
    </script>

</head>
<body>
    
    <div class="navbar">
        <a href="index.php?page=home" class="logo" style="text-decoration:none">
            <h1 class='font3'>T S<div class="font2">Tech Store</div></h1>
        </a>
        <button class="drawer-toggle" onclick="toggleDrawer()">&#9776;</button>
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

</body>
</html>
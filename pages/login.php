<?php
// pages/login.php
session_start();
include_once 'includes/functions.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user = login($username, $password)) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - E-commerce</title>
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

    <div class="login-container">
        <h2>Login</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <br><br><br>
            <span>Don't have an account? <a href="index.php?page=register">Register</a></span>
            <br><br><br><br><br>
            <div class="navlinks">
                <a href="index.php?page=home">Home</a>
            </div>
        </form>
    </div>
</body>
</html>

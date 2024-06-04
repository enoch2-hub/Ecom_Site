<?php
// functions.php
include_once 'db.php';

function getProduct($id) {
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getProducts() {
    global $pdo;

    $stmt = $pdo->query('SELECT * FROM products');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function login($username, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare('SELECT id, username, password FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    
    return false;
}

function register($username, $password, $email) {
    global $pdo;

    // Check if username already exists
    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    if ($stmt->fetch()) {
        return false; // Username already taken
    }

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $stmt = $pdo->prepare('INSERT INTO users (username, password, email) VALUES (:username, :password, :email)');
    return $stmt->execute(['username' => $username, 'password' => $hashedPassword, 'email' => $email]);
}



?>
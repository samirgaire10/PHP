<?php
// Start session for account creation
session_start();

// Validate input
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Basic validation
if ($password != $confirm_password) {
    echo "Passwords do not match. Please try again.";
    exit;
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Save to database (example using PDO)
try {
    $pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=sample', 'root', '');
    

    // $dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
    // $user = 'root';
    // $password = '';


    // Error: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'sample.users' doesn't exist



    // Check if email already exists
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    if ($stmt->fetchColumn() > 0) {
        echo "Email already registered. Please use a different email address.";
        exit;
    }
    
    // Insert new user
    $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashed_password]);
    
    echo "Registration successful!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
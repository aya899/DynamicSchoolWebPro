<?php
session_start();

// Database connection
include('dbconn.php');

// Get the posted username and password
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query the database to check if the username exists
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

// Check if username exists in the database
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Compare the entered password with the stored password (no hashing)
    if ($password == $row['password']) {
        // Password is correct, login the user
        $_SESSION['user_id'] = $row['id'];  // Store user ID in session
        header('Location: home.php');  // Redirect to home page
        exit;
    } else {
        // Password is incorrect
        header('Location: login.php?error=Incorrect password');
        exit;
    }
} else {
    // Username not found
    header('Location: login.php?error=Username not found');
    exit;
}





?>

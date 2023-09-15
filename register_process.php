<?php

include('bootstrap.php');

session_start();



$conn = new mysqli("localhost", "root", "", "userdata");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Note: Using NOW() to set both created_at and last_login initially
    $sql = "INSERT INTO users (username, email, firstname, lastname, password, created_at, last_login) 
            VALUES ('$username', '$email', '$firstname', '$lastname', '$password', NOW(), NOW())";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION["registration_success"] = true;
        
        header("Location: login.php");
    } else {
        $_SESSION["registration_error"] = "Registration failed: " . $conn->error;
        header("Location: register.php");
    }
}

$conn->close();
?>

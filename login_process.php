<?php

include('bootstrap.php');

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$conn = new mysqli("localhost", "root", "", "userdata");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;


             // Update previous_logout timestamp if exists
             $username = $row["username"];
             $update_previous_logout_sql = "UPDATE users SET previous_logout = last_login WHERE  username = '$username'";
             $conn->query($update_previous_logout_sql);
 

            $update = "UPDATE users SET last_login = NOW() WHERE username = '$username'";
            $conn->query($update);

            header("Location: dashboard.php");
         }   
         else {
            $_SESSION["login_error"] = "Invalid password";
            header("Location: login.php");
        }
    } else {
        $_SESSION["login_error"] = "Invalid username";
        header("Location: login.php");
    }
}

$conn->close();
?>

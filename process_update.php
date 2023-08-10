<?php

include('bootstrap.php');

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (!isset($_SESSION['username'])) {

    header("Location: login.php");

    exit();

}

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];

    $conn = new mysqli("localhost", "root", "", "userdata");
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email'  WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $sql = "SELECT username,updated_at FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $username = $row["username"];
            $updated_at = $row["updated_at"];
    
            // previous updated timestamp
            $update_previous_logout_sql = "UPDATE users SET lastupdated_at = '$updated_at' WHERE username = '$username'";
            $conn->query($update_previous_logout_sql);

            //current updated timestamp
            $update = "UPDATE users SET updated_at = NOW() WHERE username = '$username'";
            $conn->query($update);

        }
    }

    $conn->close();
    header("Location:dashboard.php");

    exit();

}

?>


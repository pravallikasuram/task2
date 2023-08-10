<?php

include('bootstrap.php');

session_start();

$conn = new mysqli("localhost", "root", "", "userdata");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $sql = "SELECT username,last_login FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $username = $row["username"];
        $last_login = $row["last_login"];

        // Update previous_logout timestamp
        $update_previous_logout_sql = "UPDATE users SET previous_logout = '$last_login' WHERE username = '$username'";
        $conn->query($update_previous_logout_sql);
    }
}

session_destroy();
header("Location: login.php");
exit();
?>

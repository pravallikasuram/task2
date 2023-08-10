<?php

include('bootstrap.php');

session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 'On');
 

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "userdata");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION["username"];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
    //$previouslogin = $row["previouslogin"];
    //$previousLogoutTime = $row["previous_logout"];

    $last_login = $row["last_login"];
    $lastupdated_at = $row["lastupdated_at"];
    $updated_at = $row["updated_at"];
    $created_at = $row["created_at"];
    $previous_logout = $row["previous_logout"];
} else {
    header("Location: login.php");
    exit();
}


<!DOCTYPE html>
<html>
<head>
    <style>
      html, body {
width: 100%;
height: 100%;
overflow: hidden;
}
    body { 
    background-color: #eee;; 
   }
    </style>
    <title>Dashboard</title>
</head>
<body>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-3 p-3 mb-4">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" style="margin-left: 2px;" >User Profile</li>
      <li class="nav-item">
        <a class="nav-link" href="update_profile.php" style="margin-left: 940px;margin-top: -15px;">Update Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <p class="text-muted mb-1">Welcome, <?php echo $_SESSION["username"]; ?>!</p>
            <p>This is your dashboard. You are logged in.</p>
          </div>
        </div> 
        </div> 
      
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">User Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $username; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">First Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $firstname; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $email; ?></p>
                        </div>
                        </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Last Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $lastname; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Account created at:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $created_at; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Details updated at:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $updated_at; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Last login:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $previous_logout; ?></p>
                        </div>
                    </div>
                    
                    
                       
    
                        
                        <!-- <p><a href="update_profile.php">Update Details</a></p>
                        <a href="logout.php">Logout</a> -->

                </div>
            </div>
        </div> 
    </div>
</div>
</body>
</html>

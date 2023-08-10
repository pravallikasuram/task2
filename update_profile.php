<?php


include('bootstrap.php');
session_start();

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
    
   
    $last_login = $row["last_login"];
    $created_at = $row["created_at"];
    $previous_logout = $row["previous_logout"];
} else {
    header("Location: login.php");
    exit();
}

 ?>

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
    <title>Update Profile</title>
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
                        <a class="nav-link" style="margin-left: 2px;" >Update Details</li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php" style="margin-left: 940px;margin-top: -15px;">Back to Profile</a>
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
            <p> Update your details</p>
          </div>
        </div> 
        </div> 
        
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body tag">
                <form action="process_update.php" method="post">
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="username" class="col-form-label text-md-right username mb-0">Username:</label>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0 " id="username" name="username"><?php echo $username; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="username" class="col-form-label text-md-right  mb-0">First Name</label>
                        </div>
                        <div class="col-sm-9">
                        <input type="text" class="form-control text-muted mb-0"  id="firstname" name="firstname"  value="<?php echo $firstname; ?>"><br><br>
                            
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="username" class="col-form-label text-md-right  mb-0">Last Name</label>
                        </div>
                        <div class="col-sm-9">
                        <input type="text" class="form-control text-muted mb-0"  id="lastname" name="lastname"  value="<?php echo $lastname; ?>"><br><br>
                            
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-3 form-group row">
                            <label for="username" class="col-form-label text-md-right  mb-0">Email</label>
                        </div>
                        <div class="col-sm-9">
                        <input type="text" class="form-control text-muted mb-0"  id="email" name="email"  value="<?php echo $email; ?>"><br><br>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6 offset-md-4 ">
                                <button type="submit" class="btn btn-primary align " style= "margin-left: 98px;">
                                    Update
                   
   
                </form>   

                </div>
            </div>
        </div>
</div>
</div>

    
    
  
        
    
        
        
    
</section>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .message {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            justify-content: space-around;
            width: 300px;
        }
        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .login {
            background-color: #3498db;
            color: white;
        }
        .register {
            background-color: #2ecc71;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            Welcome to Our Website!
        </div>
        <div class="buttons">
            <a href="login.php" class="button login">Log In</a>
            <a href="register.php" class="button register">Register</a>
        </div>
    </div>
</body>
</html>

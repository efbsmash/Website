<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Main Register Page -->
    <meta charset="UTF-8">
    <title>My Website</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="container">
    <div id="header">
        <header>
            Login
        </header>
    </div>
    <div id="form">
        <form action="welcome.php" method="post">
            <br>
            <div class="email">
                <input type="text" name="email" placeholder="email or username">
            </div>
            <br>
            <div class="password">
                <input type="password" name="password" placeholder="password" >
            </div>
            <br>
            <div class="loginportal">
                <button type="submit" name="login-submit">Login</button>
                <br>
            </div>
        </form>
    </div>
</div>
</body>
</html>
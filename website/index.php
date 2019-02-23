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
        Register
    </header>
</div>
    <div id="form">
        <form action="backend.inc/register.inc.php" method="post">
            <br>
            <div class="email">
                <input type="text" name="email" placeholder="email">
            </div>
            <br>
            <div class="username">
                <input type="text" name="username" placeholder="username">
            </div>
            <br>
            <div class="password">
                <input type="password" name="password" placeholder="password" >
            </div>
            <br>
            <div class="rpassword">
                <input type="password" name="rpassword" placeholder="repeat password">
            </div>
            <br>
            <div id="btn-submit">
                <button type="submit" name="btn-submit">Register</button>
                <br>
            </div>
            <div class="loginportal">
                <p>Already have an account?</p>
                <br>
                <a href="login.php"><button type="button" name="loginportal">Login</button></a>
            </div>
    </form>
    </div>
</div>
</body>
</html>
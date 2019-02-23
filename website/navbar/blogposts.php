<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="../style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="header">
    <header>Blog Posts</header>
</div>
<nav>
    <ul>
        <li><a href="blogposts.php">Blog Posts</a></li>
        <li><a href="blogposts.php">Other</a></li>
        <li><a href="blogposts.php">Other</a></li>
        <li><a href="blogposts.php">Other</a></li>
        <li>
            <form>
                <button type="submit" name="logout-button">Logout</button>
            </form>
        </li>
    </ul>
</nav>
<form action="../backend.inc/blogposts.php" method="post">
    <input type="text" name="title" placeholder="Type in here">
    <input type="text" name="text-box">
    <button type="submit" name="blog-submit">Post</button>
</form>
<?php

require "../backend.inc/databasehandler.php";

$sql = "INSERT INTO users (uidUsers) VALUE (efritz2);";

mysqli_query($conn, $sql);

?>
</body>
</html>
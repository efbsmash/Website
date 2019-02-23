<?php

if(isset($_POST['btn-submit'])) {
    require "databasehandler.php";

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    if (empty($email) || empty($username) || empty($password) || empty($rpassword)) {
        echo "Error, areas left unfilled";
        header("Location: ../index.php?error=unfilledareas");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        echo "Error, invalid email and username";
        header("Location: ../index.php?error=invalidemail&username");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error, Invalid email";
        header("Location: ../index.php?error=invalidemail");
        exit();
    } elseif (!preg_match("/^[A-Za-z0-9]*$/", $username)) {
        echo "Error, invalid username";
        header("Location: ../index.php?error=invalidusername");
        exit();
    } elseif ($password != $rpassword) {
        echo "Error, password do not match";
        header("Location: ../index.php?error=password!=rpassword");
        exit();
    } else {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../index.php?error=username&emailtaken" . $email);
                exit();
            } else {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?error=sqlerror2");
                    exit();
                } else {

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php?success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../login.php?=success");
    exit();
}


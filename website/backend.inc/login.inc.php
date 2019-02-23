<?php
if(isset($_POST['login-submit'])) {
    require "databasehandler.php";

    $mailUid = $_POST['email'];
    $password = $_POST['password'];

    if (empty($mailUid) || empty($password)) {
        echo "Error, unfilled areas";
        header("Location: ../login.php?error=emptyfields&username=");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailUid, $mailUid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                } elseif ($pwdCheck == true) {
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    header("Location: ");
                }
            } else {
                header("Location: .../login.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../welcome.php?success");
    exit();
}
<?php
include_once('DBconnection.php');
session_start();

if (isset($_POST["login"])) {

    // Check the Login creds
    $sql = "SELECT * FROM accounts WHERE username=?";
    $result = $conn->prepare($sql);
    $result->execute(array($_POST['username']));
    $count = $result->rowCount();
    $res = $result->fetch(PDO::FETCH_ASSOC);
    if ($count == 1) {
        // Compare the password
        if (password_verify($_POST['password'], $res['password'])) {
            // regenerate session id
            session_regenerate_id();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $res['id'];

            //Check if its an admin/user
            switch ($res['permission']) {
                case 'Admin':
                    header("location: indexAdmin.php");
                    exit();

                case 'Personeel':
                    header("location: index.php");
                    exit();
            }

        } else {
            echo "<script>alert('Incorrect username or password'); window.location='login.html';</script>";
        }
    } else {
        echo "<script>alert('Incorrect username or password'); window.location='login.html';</script>";
    }
}

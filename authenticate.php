<?php
include_once('DBconnection.php');
session_start();

if(empty($errors)){
    // Check the Login Credentials
    $sql = "SELECT * FROM accounts WHERE username=?";
    $result = $conn->prepare($sql);
    $result->execute(array($_POST['username']));
    $count = $result->rowCount();
    $res = $result->fetch(PDO::FETCH_ASSOC);
    if($count == 1){
        // Compare the password with password hash
        if($_POST['password'] === $res['password']){
            // regenerate session id
            session_regenerate_id();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $res['id'];
            $_SESSION['last_login'] = time();

            // redirect the user to members area/dashboard page
            header("location: index.php");
        }
        else {
            echo 'nup';
        }
    }
    else {
        echo 'nup2';
    }
}
